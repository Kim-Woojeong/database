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
			$db=connect();
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
	<div>
		<h1>상영 영화</h1>
	</div>

</body>
</html>