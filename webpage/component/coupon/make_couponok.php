<?php
include "../common/DB_Connect.php";
$db = connect();

if(empty($_POST['name'])){
  echo
  "<script>
  alert('쿠폰이름을 적어주세요');
	window.location.replace('make_coupon.php');
  </script>";
	exit;
}

$name = $_POST['name'];
$type = $_POST['selecte1'];
$rate = $_POST['selecte2'];
$sql = $db->prepare("insert into coupon values('$name','$type','$rate')");
$sql->execute();

echo
"<script>
alert('쿠폰이 생성되었습니다.');
window.location.replace('make_coupon.php');
</script>";
?>
