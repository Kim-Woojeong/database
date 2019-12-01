<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="../common/styles/common.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="styles/movie_search.css" />
	<title></title>
</head>
<body>
	<!-- top -->
	<header class="service_menu">
		<ul id="gnb">
			<?php
			include "../DB_Connect.php";
			include "../top_login.php";
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

	<!--start -->
	<div class="section_title">
		<h1>영화 검색</h1>
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
		if(count($result)==0)
			echo "<div style=\"margin-top:100px;\"><h3>죄송합니다. 현재 지원중인 영화가 없습니다.</h3></div>";
		foreach ($result as $key => $value) { ?>
			<div class="onemovie">
				<?php
				echo $key + 1; ?>
				<span>
				<!-- 기다려주세요 수정예정입니다. cineq 처럼 이미지에 인라인속성으로 링크 두개 넣습니다.-->
				<a href="movie.php?id=$value[movie_id]" class="link_info"></a>
				</span>
				<img src="../common/img/logo.png" class="movie_image">
				<?php echo "<p>" . $value[movie_name] . "</p>";
				echo "<p>" . $value[release_date] . "</p>";
				echo "<p>" . $value[rating] . "</p>";
				?>
			</div>
		<?php } $conn = null; ?>
	</div>

</body>
</html>
