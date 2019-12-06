<?php
if ( empty($_POST['ID']) || empty($_POST['password']) || empty($_POST['name']) ) {
	header("Content-Type: text/html; charset=UTF-8");
	echo "<script>alert('칸에 적힌거 꼬박꼬박 입력하세요. 그정돈 할 수 있자나요? 못해요? 하...');";
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
	echo $e->getmessage();
	echo "<script>alert('예외처리 안한줄 알았냐? 다시 입력해');";
	echo "window.location.replace('register.php');</script>";
}

$conn = null;  // disconnect db
echo "<script>alert('당신이 이겼어요.. 이제 이 웹페이지를 즐겨주세요..');</script>";
?>
<meta http-equiv="refresh" content="0;url=../common/cinema_test.php" />