<?php
include "../common/DB_Connect.php";
include "../employee/top_login.php";
$db=connect();
$item1 = $_POST['select1'];
$item2 = $_POST['select2'];
$cinema_id = $_SESSION['cinema_id'];
if($item1 == 0 and $item2 == 0) {
  echo
  "<script>
  alert('시키신 재고가 없습니다');
	window.location.replace('stock_supply.php');
  </script>";
}
if($item1 != 0 and $item2 == 0) {
  $sql1 = "update stock set amount = amount+$item1 where cinema_id ='$cinema_id' and stock_name='옥수수알'";
  $stt1=$db->prepare($sql1);
  $stt1->execute();

  $sql2 = "update stock set total = total+$item1 where cinema_id ='$cinema_id' and stock_name='옥수수알'";
  $stt2=$db->prepare($sql2);
  $stt2->execute();

  echo
  "<script>
  alert('옥수수알 $item1 개가 주문되었습니다.');
	window.location.replace('stock_supply.php');
  </script>";
}
if($item1 == 0 and $item2 != 0) {
  $sql1 = "update stock set amount = amount+$item2 where cinema_id ='$cinema_id' and stock_name='콜라액상'";
  $stt1=$db->prepare($sql1);
  $stt1->execute();

  $sql2 = "update stock set total = total+$item2 where cinema_id='$cinema_id' and stock_name='콜라액상'";
  $stt2=$db->prepare($sql2);
  $stt2->execute();

  echo
  "<script>
  alert('콜라액상 $item2 개가 주문되었습니다.');
	window.location.replace('stock_supply.php');
  </script>";
}
if($item1 != 0 and $item2 != 0) {

  $sql1 = "update stock set amount = amount+$item1 where cinema_id ='$cinema_id' and stock_name='옥수수알'";
  $stt1=$db->prepare($sql1);
  $stt1->execute();

  $sql2 = "update stock set total = total+$item1 where cinema_id ='$cinema_id' and stock_name='옥수수알'";
  $stt2=$db->prepare($sql2);
  $stt2->execute();

  $sql3 = "update stock set amount = amount+$item2 where cinema_id ='$cinema_id' and stock_name='콜라액상'";
  $stt3=$db->prepare($sql3);
  $stt3->execute();

  $sql4 = "update stock set total = total+$item2 where cinema_id='$cinema_id' and stock_name='콜라액상'";
  $stt4=$db->prepare($sql4);
  $stt4->execute();

  echo
  "<script>
  alert('옥수수알 $item1 개, 콜라액상 $item2 개가 주문되었습니다.');
	window.location.replace('stock_supply.php');
  </script>";
}
?>
