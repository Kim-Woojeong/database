<?php
include "../DB_Connect.php";
$conn = connect();
try{
	$stmt = $conn->prepare("insert into movie_review(movie_id,customer_id,score,contents) values (:movie_id,:customer_id,:score,:contents)");
	$stmt -> bindValue(":movie_id",$_POST['movie_id']);
	$stmt -> bindValue(":customer_id","minjaejoa");
	$stmt -> bindValue("contents",$_POST['review']);
	$stmt -> bindValue(":score",$_POST['score']);
	$stmt->execute();
	$conn ->null;
}catch (PDOException $e) {
	if($e->getcode()==23000)
		echo "<script>alert('리뷰를 두번 쓸려고? 욕심쟁이네')</script>";
	else{
		echo "<script>alert('오 새로운 오류다 뭐가 문제일까요? 0.2초 준다 잘 봐봐')</script>";
		echo $e->getmessage();
	}
}
?>
<meta http-equiv="refresh" content="0;url=movie.php?id=<?=$_POST['movie_id']?>" />
