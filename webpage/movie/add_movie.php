<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>영화등록</title>
	<link rel="stylesheet" type="text/css" href="../common/styles/common.css" >
</head>
<body>
	<header class="service_menu">
		<ul id="gnb">
			<?php include "../DB_Connect.php";
			include "../top_login.php";
			$db=connect();
			?>
		</ul>
	</header>  
    <?php
    include "../navigator.php";
    ?>
	<h1 style="margin-left: 650px; padding-top: 120px;">영화 등록</h1>
	<form action="adding_movie.php" method="POST" enctype="multipart/form-data" style="border: 0.2em solid red; width: 500px; height: 200px; margin-left: 500px;">
		<input type="file" name="poster" style="float: left; height: 100%; padding-top: 80px; padding-left: 20px;">
		<div style="margin: 10px;">	
			<input type="text" name="id" placeholder="영화ID">
			<input type="text" name="title" placeholder="영화제목">
			<select name="rating">
				<option>전체관람가</option>
				<option>12세이용가</option>
				<option>15세이용가</option>
				<option>18세이용가</option>
			</select>
			<input type="text" name="running_time" placeholder="러닝타임">
			<input type="text" name="release_date" placeholder="출시일">
			<input type="text" name="distributor" placeholder="배급사">
			<input type="text" name="contents" placeholder="내용">
		</div>
		<input type="submit" name="">
	</form>
</body>
</html>