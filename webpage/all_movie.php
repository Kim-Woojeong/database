<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="common/styles/common.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="common/styles/movie_search.css" />
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
		<h1>명화 검색</h1>
	</div>
	<div class="search_bar">
		<form action="" method="GET">
			<label>
				이쁜 디자인 부탁드려요~
				<input type="text" name="q" value="<?= $_GET['q']?>" />
			</label>
			<input type="submit" name="" />
		</form>
	</div>
	<hr/>	
	<div class="sorting_movie">
		<form action="" method="POST">
			<button value="total_audience desc" name="sortbutton">인기순</button>
			<button value="release_date desc" name="sortbutton">최신순</button>
			<button value="movie_name" name="sortbutton">가나다순</button>
		</form>
	</div>
	<div class="overview_movie">
		<?php 
		$conn = connect();
		$order = "release_date desc";
		if(isset($_POST['sortbutton']))
			$order = $_POST['sortbutton'];
		$search = $_GET['q'];
		$stmt = $conn->prepare("SELECT movie_id,movie_name,rating,release_date,total_audience from movie where movie_name like '%$search%' order by $order");
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach ($result as $key => $value) { ?>
			<div class="onemovie">
				<?php
				echo $key + 1;
				echo "<a href=\"movie.php?id=$value[movie_id]\"><img src=\"../snapshot/all%20tables.PNG\" class=\"movie_image\"></a>"; # 이미지 이름 규격화한 후 배경화면으로 이미지를 등록합니다.
				echo "<p>" . $value[movie_name] . "</p>";
				echo "<p>" . $value[release_date] . "</p>";
				echo "<p>" . $value[rating] . "</p>";
				?>
			</div>
		<?php } $conn = null; ?>
	</div>
	
</body>
</html>