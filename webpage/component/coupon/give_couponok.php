<?php
include "../common/DB_Connect.php";
$db = connect();

if(empty($_POST['coupon_name']) || empty($_POST['id'])){
  echo
  "<script>
  alert('제대로 작성해주세요.');
	window.location.replace('give_coupon.php');
  </script>";
	exit;
}

$randomNum = mt_rand(1,2147483647);
$coupon_name = $_POST['coupon_name'];
$id = $_POST['id'];
$term = $_POST['selecte'];

$view_sql = "select customer_id from Coupon_box natural join customer_info where customer_id = '$id'";
$view_stt=$db->prepare($view_sql);
$view_stt->execute();
$result = $view_stt->fetch(PDO::FETCH_ASSOC);

if($result['customer_id'] != $name) {
  "<script>
  alert('그런 고객은 없습니다..');
	window.location.replace('give_coupon.php');
  </script>";
}

$check_sql = "select coupon_number from coupon_box where customer_id = '$id'";
$check_stt=$db->prepare($check_sql);
$check_stt->execute();

foreach($check_stt as $ch) {
  while ($ch['coupon_number'] == $randomNum){
    $randomNum = mt_rand(1,2147483647);
  }
}

$sql = $db->prepare("insert into coupon_box values($randomNum,'$id','$coupon_name',now(),'$term',0)");
$sql->execute();

echo
"<script>
alert('쿠폰이 지급되었습니다.');
window.location.replace('give_coupon.php');
</script>";
?>
