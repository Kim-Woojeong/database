<?php
if ( empty($_POST['loginId']) || empty($_POST['password']) ) {
	header("Content-Type: text/html; charset=UTF-8");
	echo "<script>alert('아이디 또는 비밀번호가 빠졌거나 잘못된 접근입니다.');";
	echo "window.location.replace('login.php');</script>";
	exit;
}
$id=$_POST['loginId'];
$password=$_POST['password'];
include "../common/DB_Connect.php";
$conn = connect();
$stmt = $conn->prepare("SELECT password,customer_name,rank_name FROM customer_info where customer_id = :id");
$stmt -> bindValue(":id",$id);
$stmt->execute();
$result = $stmt->fetchAll();
if(count($result) == 0){
	header("Content-Type: text/html; charset=UTF-8");
	echo "<script>alert('당신은 회원이 아닙니다.');";
	echo "window.location.replace('login.php');</script>";
	exit;
}
if(!password_verify($password, $result[0]['password'])){
	header("Content-Type: text/html; charset=UTF-8");
	echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.');";
	echo "window.location.replace('login.php');</script>";
	exit;
}
session_start();
$_SESSION['id']=$id;
$_SESSION['name']=$result[0]['customer_name'];
$_SESSION['rank']=$result[0]['rank_name'];
$conn = null;  // disconnect db
?>
<meta http-equiv="refresh" content="0;url=../common/cinema_test.php" />
