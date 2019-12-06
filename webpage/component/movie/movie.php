<!DOCTYPE html>
<?php
include "../common/DB_Connect.php";
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
	<link rel="stylesheet" type="text/css" href="../../styles/movie_info.css" />
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
			<img src="404notfound.png"/><br>
			<a href="all_movie.php">여긴 너에겐 아직 일러! 돌아가ㅠㅠ</a>
		</div>
		<?php
	}else{
		?>

		<header class="service_menu">
			<ul id="gnb">
				<?php
				include "../common/top_login.php";
				?>
			</ul>
		</header>  
		<?php
		include "../common/navigator.php";
		?>

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
						?>
						<p>작성자:<?=$value['customer_id']?></p>
						<p>작성일:<?=$value['written_time']?></p>
						<p>내용:<?=$value['contents']?></p>
						<p>점수:<?=$value['score']?></p>
						<hr/>
					<?php }
				}
				?>

				<?php if(isset($_SESSION['id'])){ ?>

					<form action="REVIEW.php" method="POST">
						<input type="hidden" name="movie_id" value="<?=$_GET['id'] ?>">
						<label>함 리뷰 작성해 봐라~-><input type="text" name="review" /></label>
						<select name="score">
							<?php for ($i=0; $i < 5; $i+=0.01) { ?>
								<option><?=$i?></option>
							<?php } ?>
						</select>
						<input type="submit" name="" />
					</form>

				<?php } else{ ?>
					<div>
						<p>로그인 해야지 리뷰 쓸 수 있어요.</p>
					</div>
				<?php } ?>
			</div>
			<div class="POSTER SEC">
				<img src = '../img/movie/movie_<?=$movie_id?>.jpeg' id="poster" onerror="this.src='../img/movie/movie_no_image2.jpeg';">
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
				?>
				<p>배우이름:<?=$value['name']?></p>
				<p>영문이름:<?=$value['english_name']?></p>
				<p>국적:<?=$value['nationality']?></p>
				<p>개인사이트:<a href=<?=$value['site']?>><?=$value['site']?></a></p>
				<p>소개:<?=$value['about_me']?></p>
				<p>역할:<?=$value['role']?></p>
				<hr/>
			<?php } ?>
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
				?>
				<p>배우이름:<?=$value['name']?></p>
				<p>영문이름:<?=$value['english_name']?></p>
				<p>국적:<?=$value['nationality']?></p>
				<p>개인사이트:<a href=<?=$value['site']?>><?=$value['site']?></a></p>
				<p>소개:<?=$value['about_me']?></p>
				<p>역할:<?=$value['role']?></p>
				<hr/>
			<?php } ?>
		</div>
	<?php } $conn = null ?>
</body>
</html>
