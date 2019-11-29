<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="common/styles/common.css" type="text/css" rel="stylesheet" />
	<title></title>
</head>
<body>
	<!-- top -->
	<header class="service_menu">
		<ul id="gnb">
			<?php
			include "DB_Connect.php";
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
	
	<!--start -->
	<div class="section_title">
		<h2>상영 영화</h1>
	</div>
	<div class="sorting_movie">
		<button>인기순</button>
		<button>최신순</button>
		<button>가나다순</button>
	</div>
	<div class="overview_movie">
		<?php 
			$conn = connect();
			$stmt = $conn->prepare("SELECT movie_id,movie_name,rating,release_date from movie");
			$stmt->execute();
			$result = $stmt->fetchAll();
			foreach ($result as $key => $value) { ?>
		<div class="onemovie">
			<img src="../snapshot/all%20tables.PNG" class="movie_image"> <!-- 이미지 이름 규격화해서 for 문안에 넣습니다. -->
			<?php
			echo "<p>" . $value[movie_name] . "</p>";
			echo "<p>" . $value[release_date] . "</p>";
			echo "<p>" . $value[rating] . "</p>";
			?>
		</div>
		<?php } ?>
	</div>
	
</body>
</html>