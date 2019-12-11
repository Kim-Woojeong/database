<?php
if ( empty($_POST['ID']) || empty($_POST['name']) || empty($_POST['ssn']) || empty($_POST['hp']) || empty($_POST['account_num']) ) {
	header("Content-Type: text/html; charset=UTF-8");
	echo "<script>alert('칸에 적힌거 꼬박꼬박 입력하세요. 그정돈 할 수 있자나요? 못해요? 하...');";
	echo "window.location.replace('register.php');</script>";
	exit;
}
include "../common/DB_Connect.php";
$conn = connect();
try{
	$stmt = $conn->prepare("insert into employee(employee_id,employee_name,ssn,hp,account_num,cinema_id,division) values(:employee_id,:employee_name,:ssn,:hp,:account_num,:cinema_id,:division)");
	$stmt -> bindValue(":employee_id",$_POST['ID']);
	$stmt -> bindValue(":employee_name",$_POST['name']);
	$stmt -> bindValue(":ssn",$_POST['ssn']);
	$stmt -> bindValue(":hp",$_POST['hp']);
	$stmt -> bindValue(":account_num",$_POST['account_num']);
	$stmt -> bindValue(":cinema_id",$_POST['selectedQuestion']);
	$stmt -> bindValue(":division",$_POST['selectedQuestion']);
	$stmt->execute();
} catch(PDOException $e){
	echo $e->getmessage();
	echo "<script>alert('예외처리 안한줄 알았냐? 다시 입력해');";
	echo "window.location.replace('register.php');</script>";
}

$conn = null;  // disconnect db
echo "<script>alert('아 몰랑');</script>";
?>
<meta http-equiv="refresh" content="0;url=../employee/login.php" />
