<?php
include "DB_Connect.php";
$conn->connect();
try{
	$stmt = $conn->prepare("insert into movie(movie_id,movie_name,rating,running_time,release_date,distributor,contents) values (:movie_id,:movie_name,:rating,:running_time,:release_date,:distributor,:contents)");
	$stmt -> bindValue(":movie_id",$_POST['movie_id']);
	$stmt -> bindValue(":movie_name",$_POST['movie_name']);
	$stmt -> bindValue(":rating",$_POST['rating']);
	$stmt -> bindValue(":running_time",$_POST['running_time']);
	$stmt -> bindValue(":release_date",$_POST['release_date']);
	$stmt -> bindValue(":distributor",$_POST['distributor']);
	$stmt -> bindValue(":contents",$_POST['contents']);
	$stmt->execute();
	$conn ->null;
}catch (PDOException $e) {
	echo "<script>alert('오 새로운 오류다 뭐가 문제일까요? 0.2초 준다 잘 봐봐')</script>";
	echo $e->getmessage();
}
?>
<meta http-equiv="refresh" content="0;url=add_movie.php" />