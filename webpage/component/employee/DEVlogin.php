<?php
if ( empty($_POST['loginId']) ) {
	header("Content-Type: text/html; charset=UTF-8");
	echo "<script>alert('다시 입력해주세요');";
	echo "window.location.replace('login.php');</script>";
	exit;
}
$id=$_POST['loginId'];
include "../DB_Connect.php";
$conn = connect();
$stmt = $conn->prepare("SELECT employee_id,employee_name,division FROM employee where employee_id = :id");
$stmt -> bindValue(":id",$id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$result) {
	header("Content-Type: text/html; charset=UTF-8");
	echo "<script>alert('다시 입력해주세요');";
	echo "window.location.replace('login.php');</script>";
}
session_start();
$_SESSION['id']=$result['employee_id'];
$_SESSION['name']=$result['employee_name'];
$_SESSION['division']=$result['division'];
$conn = null;  // disconnect db
?>
<meta http-equiv="refresh" content="0;url=../employee_info/calendar.php" />
