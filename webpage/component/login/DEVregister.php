<?php
if ( empty($_POST['ID']) || empty($_POST['password']) || empty($_POST['name']) || empty($_POST['gender'])) {
	header("Content-Type: text/html; charset=UTF-8");
	echo "<script>alert('필수정보를 모두 기입해주세요.');";
	echo "window.location.replace('register.php');</script>";
	exit;
}
include "../common/DB_Connect.php";
$conn = connect();
try{
	$stmt = $conn->prepare("insert into customer_info(customer_id,password,customer_name,gender,road_address,detail_address,customer_hp,email_address,birth_date) values(:customer_id,:password,:customer_name,:gender,:road_address,:detail_address,:customer_hp,:email_address,:birth_date)");
	$stmt -> bindValue(":customer_id",$_POST['ID']);
	$stmt -> bindValue(":password",password_hash($_POST['password'],PASSWORD_DEFAULT));
	$stmt -> bindValue(":customer_name",$_POST['name']);
	if($_POST['gender'] == "남자")
		$stmt -> bindValue(":gender",1);
	if($_POST['gender'] == "여자")
		$stmt -> bindValue(":gender",2);
	$stmt -> bindValue(":road_address",$_POST['selectedQuestion']);
	$stmt -> bindValue(":detail_address",$_POST['location']);
	$stmt -> bindValue(":customer_hp",$_POST['phonenumber']);
	$stmt -> bindValue(":email_address",$_POST['email']);
	$MON = $_POST['month'];
	if(strlen($MON) < 2)
		$MON = "0" . $MON;	
	$DIE = $_POST['day'];
	if(strlen($DIE) < 2)
		$DIE = "0" . $DIE;
	$stmt -> bindValue(":birth_date",$_POST['year'] . $MON . $DIE);
	$stmt->execute();
} catch(PDOException $e){
	echo "<script>alert('회원가입에 실패했습니다. 오류코드:" . $e->getmessage() ."');";
	echo "window.location.replace('register.php');</script>";
}

$conn = null;  // disconnect db
echo "<script>alert('회원가입에 성공했습니다.');</script>";
?>
<meta http-equiv="refresh" content="0;url=../common/cinema_test.php" />