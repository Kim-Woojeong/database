<?php
include "../common/DB_Connect.php";
echo $_POST['seat'];
$seat = explode(',' , $_POST['seat']);
session_start();
$conn = connect();
parse_str($_POST['theater_time']);
$sql_seat = "select seat_number from schedule_seat where cinema_id = :cinema_id and theater_name = :theater_name and movie_time = :movie_time";
try{
	$stmt_seat = $conn -> prepare($sql_seat);
	$stmt_seat -> bindValue(":cinema_id",$_POST['cinema']);
	$stmt_seat -> bindValue(":theater_name",$theater);
	$stmt_seat -> bindValue(":movie_time",$time);
	$stmt_seat -> execute();
	$result_seat = $stmt_seat -> fetchAll();
	$only = 1;
	foreach ($result_seat as $key1 => $value1) {
		foreach ($seat as $key2 => $value2) {
			if($value1['seat_number'] == $value2 && $only){
				$only = 0;
			}
		}
	}
} catch(PDOException $e){
	echo '<script>alert("좌석 정보를 불러오는데 실패했습니다. 에러코드: ' . $e->getCode() .'");
	console.log("' . $e->getMessage() . '");
	window.history.back();</script>';
}

if(!$only){
	echo '<script>alert("이미 선택된 좌석입니다.");
	window.history.back();</script>';
}
else{
	try{
		$sql = "insert into ticketing_info values (NULL,CURRENT_TIMESTAMP,:price,:pay_way,:send_contact,:coupon_number,:customer_id,:movie_time,:theater_name,:cinema_id,:movie_id)";
		$stmt = $conn -> prepare($sql);
		$stmt -> bindValue(":price",$_POST['price']);
		$stmt -> bindValue(":pay_way",$_POST['pay_way1'] . $_POST['pay_way2']);
		$stmt -> bindValue(":send_contact",$_POST['send_contact']);
		if(isset($_SESSION['id'])){
			$stmt -> bindValue(":customer_id",$_SESSION['id']);
			if($_POST['coupon'] == 'NULL')
				$stmt -> bindValue(":coupon_number",NULL);
			else{
				$stmt -> bindValue(":coupon_number",$_POST['coupon']);
				$sql_usecoupon = 'update coupon_box set usage_status = 1 where coupon_number = :coupon_number';
				$stmt_usecoupon = $conn -> prepare($sql_usecoupon);
				$stmt_usecoupon -> bindValue(":coupon_number",$_POST['coupon']);
				$stmt_usecoupon -> execute();
			}
		}
		else{
			$stmt -> bindValue(":customer_id",NULL);
			$stmt -> bindValue(":coupon_number",NULL);
		}
		$stmt -> bindValue(":movie_time",$time);
		$stmt -> bindValue(":theater_name",$theater);
		$stmt -> bindValue(":cinema_id",$_POST['cinema']);
		$stmt -> bindValue(":movie_id",$_POST['movie']);
		$stmt -> execute();
		$id = $conn->lastInsertId();
		$sql_seating = 'insert into schedule_seat values(:movie_time,:theater_name,:cinema_id,:movie_id,:seat_number,:ticket_id)';
		$stmt_seating = $conn -> prepare($sql_seating);
		$stmt_seating -> bindValue(":movie_time",$time);
		$stmt_seating -> bindValue(":theater_name",$theater);
		$stmt_seating -> bindValue(":cinema_id",$_POST['cinema']);
		$stmt_seating -> bindValue(":movie_id",$_POST['movie']);
		$stmt_seating -> bindParam(":seat_number",$seat);
		$stmt_seating -> bindValue(":ticket_id",$id);
		foreach ($seat as $key => $value) {
			$seat = $value;
			$stmt_seating -> execute();
		}
		echo '<script>alert("예매가 성공적으로 완료되었습니다.")</script>';
	} catch(PDOException $e){
		echo '<script>
		alert("결제에 실패했습니다. 에러코드: ' . $e->getCode() .'");
		console.log("' . $e->getMessage() . '");
		window.history.back();</script>';
	}
}
?>
<!-- <meta http-equiv="refresh" content="0;url=../common/cinema_test.php" /> -->