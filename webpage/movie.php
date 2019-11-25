<!DOCTYPE html>	
<?php
include "DB_Connect.php";
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
	<link href="common/styles/common.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="common/styles/movie.css" />
	<title>영화검색:<?= $movie_name?></title>
</head>
<body>
	<!-- top -->
	<header class="service_menu">
		<ul id="gnb">
			<?php
			include "top_login.php";
			?>
		</ul>
	</header>
	<nav class="navbar">
		<div class="dropdown">
			<button class="dropbtn">영화
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				<a href="#">상영영화</a>
				<a href="#">상영예정영화</a>
				<a href="#">영화검색</a>
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
	<div style="overflow: hidden; height: 500px;">
		<div class="SEC">
			나중에 할꼐요
		</div>
		<div class="SEC POSTER">
		</div>
		<div class="SEC">
			힘들어요
		</div>
		
	</div>
</body>
</html>