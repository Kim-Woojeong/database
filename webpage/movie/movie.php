<!DOCTYPE html>
<?php
include "../DB_Connect.php";
$movie_id=$_GET['id'];
$conn = connect();
$stmt = $conn->prepare("SELECT * from movie where movie_id = $movie_id");
$stmt->execute();
$result = $stmt->fetchAll();
$movie_name = $result[0]['movie_name'];
?>
<html>
<head>
	<meta charset="utf-8">
	<link href="../common/styles/common.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="styles/movie_info.css" />
	<script type="text/javascript" src="js/movie.js"></script>
	<title>
		<?php 
		if(count($result) == 0) 
			echo "404 not found"; 
		else 
			echo "영화검색" . $movie_name; 
		?>
	</title>
</head>
<body>
	<?php
	# wrong wepage site for id
	if(count($result) == 0){ ?>
		<div id="notfound" >
			<img src="404notfound 꼬으면 바꾸셈.png"/>
		</div>
		<?php
	}else{
		?>

		<header class="service_menu">
			<ul id="gnb">
				<?php
				include "top_login.php";
				?>
			</ul>
		</header>
		<nav class="navbar">
			<a href="../cinema_test.html"><img src="../common/img/logo.png"></a>
			<div class="dropdown">
				<button class="dropbtn">영화
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="Screening_movie.php">상영영화</a>
					<a href="new_movie.php">상영예정영화</a>
					<a href="all_movie.php">영화검색</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">이벤트
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="#">진행중</a>
					<a href="#">종료</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">영화관
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="#">영화관 찾기</a>
				</div>
			</div>
		</nav>

		<!-- SUPER_ISO_ISO -->
		<div>
			<div class="REVIEW SEC">
				<?php
				$stmt_review = $conn->prepare("SELECT * from movie_review where movie_id = $movie_id");
				$stmt_review->execute();
				$result_review = $stmt_review->fetchAll();
				if(count($result_review) == 0)
					echo "등록된 리뷰가 없습니다.";
				else{
					$stmt_avg = $conn->prepare("SELECT round(avg(score),2) as avg_score from movie_review where movie_id = $movie_id");
					$stmt_avg->execute(); ?>
					<h3>평점: <?=$stmt_avg->fetchAll()[0]['avg_score']?> </h3>
					<?php
					foreach ($result_review as $key => $value) {
						echo "<p></p>";
						echo "작성자:" . $value['customer_id'];
						echo "작성일:" . $value['written_time'];
						echo "내용:" . $value['contents'];
						echo "점수:" . $value['score'];
						echo "<hr/>";
					}
				}
				?>
				<form action="REVIEW.php" method="POST">
					<input type="hidden" name="movie_id" value="<?=$_GET['id'] ?>">
					<label>함 리뷰 작성해 봐라~-><input type="text" name="review" /></label>
					<select name="score">
						<?php for ($i=0; $i < 5; $i+=0.001) { ?>
							<option><?=$i?></option>
						<?php } ?>
					</select>
					<input type="submit" name="" />
				</form>
			</div>
			<div class="POSTER SEC" style="overflow:auto;">
				<?php
				echo '<img class = \'posterimg\' src="data:image/jpeg;base64,'. base64_encode($result[0]['movie_poster']) .'"/>'
				?>
			</div>
			<div class="DETAIL SEC">
				<h2><?=$movie_name?></h2>
				<p><?=$result[0]['rating']?></p>
				<p><?=$result[0]['running_time']?>분~</p>
				<p><?=$result[0]['release_date']?>에 첫 상영했나 봅니다.</p>
				<p><?=$result[0]['distributor']?>에서 배급했어용</p>
				<p><?=$result[0]['total_audience']?>마리나 이 영화를 봤네요. 생각보다 바글바글했네요.</p>
			</div>
		</div>
		<div class="Tree">
			<div>
				<button id="ContentsB" onclick="Button_Tree('Contents')">Contents!</button>
				<button id="ActorsB" onclick="Button_Tree('Actors')">Actors!</button>
				<button id="DirectorsB" onclick="Button_Tree('Directors')">DIRECTOR & 잡것들</button>
			</div>
		</div>
		<div class="fruit" id="Contents">
			<?php
			$stmt_contents = $conn->prepare("select contents from movie where movie_id = \"$movie_id\"");
			$stmt_contents -> execute();
			$result_contents = $stmt_contents->fetchAll();
			echo $result_contents[0]['contents'];
			?>
		</div>
		<div class="fruit" id="Actors">
			<h3>배우</h3>
			<?php
			$stmt_actors = $conn->prepare("select * from actor natural join (select actor_number,role from movie_actor where movie_id = \"$movie_id\") as tmp");
			$stmt_actors->execute();
			$result_actors = $stmt_actors->fetchAll();
			if(count($result_actors)==0)
				echo "이 영화에 등록된 배우 정보가 없습니다. 관리자에게 따지세요.";
			foreach ($result_actors as $key => $value) {
				echo "<p>배우이름:" . $value['name'] . "</p>";
				echo "<p>영문이름:" . $value['english_name'] . "</p>";
				echo "<p>국적:" . $value['nationality'] . "</p>";
				echo "<p>개인사이트:<a href=" . $value['site']. ">" . $value['site'] . "</a></p>";
				echo "<p>소개:" . $value['about_me'] . "</p>";
				echo "<p>역할:" . $value['role'] . "</p>";
				echo "<hr/>";
			}
			?>
		</div>
		<div class="fruit" id="Directors">
			<h3>감독</h3>
			<?php
			$stmt_directors = $conn->prepare("select * from director natural join (select crew_id,role from movie_director where movie_id = \"$movie_id\") as tmp");
			$stmt_directors->execute();
			$result_directors = $stmt_directors->fetchAll();
			if(count($result_directors)==0)
				echo "이 영화에 등록된 배우 정보가 없습니다. 관리자에게 따지세요.";
			foreach ($result_directors as $key => $value) {
				echo "<p>이름:" . $value['name'] . "</p>";
				echo "<p>영문이름:" . $value['english_name'] . "</p>";
				echo "<p>국적:" . $value['nationality'] . "</p>";
				echo "<p>개인사이트:<a href=" . $value['site']. ">" . $value['site'] . "</a></p>";
				echo "<p>소개:" . $value['about_me'] . "</p>";
				echo "<p>역할:" . $value['role'] . "</p>";
				echo "<hr/>";
			}
			?>
		</div>
	<?php } $conn = null ?>
</body>
</html>
