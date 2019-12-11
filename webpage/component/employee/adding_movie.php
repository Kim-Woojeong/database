<?php
include "../common/DB_Connect.php";
$conn=connect();
try{
	$stmt = $conn->prepare("insert into movie(movie_id,movie_name,movie_poster,rating,running_time,release_date,distributor,contents) values (:movie_id,:movie_name,:movie_poster,:rating,:running_time,:release_date,:distributor,:contents)");
	$stmt -> bindValue(":movie_id",$_POST['id']);
	$stmt -> bindValue(":movie_name",$_POST['title']);
	$file = file_get_contents($_FILES['poster']['tmp_name']);
	unlink($_FILES['poster']['tmp_name']);
	$data = Thumbnail_String($file, 340);
	$stmt -> bindValue(":movie_poster",$data);
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
