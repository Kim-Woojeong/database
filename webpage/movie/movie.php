<!DOCTYPE html>
<?php
include "../DB_Connect.php";
$movie_id=$_GET['id'];
$conn = connect();
$stmt = $conn->prepare("SELECT * from movie where movie_id = $movie_id");
$stmt->execute();
$result = $stmt->fetchAll();
$movie_name = $result[0][movie_name];
?>
<html>
<head>
	<meta charset="utf-8">
	<link href="../common/styles/common.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="styles/movie_info.css" />
	<script type="text/javascript" src="movie.js"></script>
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
				$stmt2 = $conn->prepare("SELECT * from movie_review where movie_id = $movie_id");
				$stmt2->execute();
				$result2 = $stmt2->fetchAll();
				if(count($result2) == 0)
					echo "얔ㅋㅋㅋㅋ 이 영화 리뷰 없다. 지금 리뷰 쓰면 너가 준 점수가 영화 평점임 ㅋㅋㅋ";
				else{
					$stmt_avg = $conn->prepare("SELECT round(avg(score),2) as avg_score from movie_review where movie_id = $movie_id");
					$stmt_avg->execute(); ?>
					<h3>평점: <?=$stmt_avg->fetchAll()[0][avg_score]?> </h3>
					<?php
					foreach ($result2 as $key => $value) {
						echo "<p></p>";
						echo "작성자:" . $value[customer_id];
						echo "작성일:" . $value[written_time];
						echo "점수:" . $value[score];
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
					<input type="submit" name="" onclick="PLZMAKELOGINFUNC()" />
				</form>
			</div>
			<div class="POSTER SEC" style="overflow:auto;">
				<?php
				for ($i=0; $i < 1000; $i++) { ?>
					포스터 넣고 테두리 속성으로 좀 꾸며주면 되지 않을까, 포스터 크기 맞춰서 영역 크기 재조정하고!
				<?php } ?>
			</div>
			<div class="DETAIL SEC">
				<h2><?=$movie_name?></h2>
				<p><?=$result[0][rating]?></p>
				<p><?=$result[0][running_time]?>분~</p>
				<p><?=$result[0][release_date]?>에 첫 상영했나 봅니다.</p>
				<p><?=$result[0][distributor]?>에서 배급했어용</p>
				<p><?=$result[0][total_audience]?>마리나 이 영화를 봤네요. 생각보다 바글바글했네요.</p>
			</div>
		</div>
		<div>
			<div>
				<button>Contents!</button>
				<button>Actors!</button>
				<button>DIRECOTR & 잡것들</button>
			</div>
		</div>
	<?php }?>
</body>
</html>
