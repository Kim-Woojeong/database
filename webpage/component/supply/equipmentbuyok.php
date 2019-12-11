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
  alert('시키신 비품이 없습니다');
	window.location.replace('equipment_supply.php');
  </script>";
}
if($item1 != 0 and $item2 == 0) {
  $sql1 = "update equipment set amount = amount+$item1 where cinema_id ='$cinema_id' and equip_name='3D안경'";
  $stt1=$db->prepare($sql1);
  $stt1->execute();

  $sql2 = "update equipment set total = total+$item1 where cinema_id ='$cinema_id' and equip_name='3D안경'";
  $stt2=$db->prepare($sql2);
  $stt2->execute();

  echo
  "<script>
  alert('3D안경 $item1 개가 주문되었습니다.');
	window.location.replace('equipment_supply.php');
  </script>";
}
if($item1 == 0 and $item2 != 0) {
  $sql1 = "update equipment set amount = amount+$item2 where cinema_id ='$cinema_id' and equip_name='유니폼'";
  $stt1=$db->prepare($sql1);
  $stt1->execute();

  $sql2 = "update equipment set total = total+$item2 where cinema_id='$cinema_id' and equip_name='유니폼'";
  $stt2=$db->prepare($sql2);
  $stt2->execute();

  echo
  "<script>
  alert('유니폼 $item2 개가 주문되었습니다.');
	window.location.replace('equipment_supply.php');
  </script>";
}
if($item1 != 0 and $item2 != 0) {

  $sql1 = "update equipment set amount = amount+$item1 where cinema_id ='$cinema_id' and equip_name='3D안경'";
  $stt1=$db->prepare($sql1);
  $stt1->execute();

  $sql2 = "update equipment set total = total+$item1 where cinema_id ='$cinema_id' and equip_name='3D안경'";
  $stt2=$db->prepare($sql2);
  $stt2->execute();

  $sql3 = "update equipment set amount = amount+$item2 where cinema_id ='$cinema_id' and equip_name='유니폼'";
  $stt3=$db->prepare($sql3);
  $stt3->execute();

  $sql4 = "update equipment set total = total+$item2 where cinema_id='$cinema_id' and equip_name='유니폼'";
  $stt4=$db->prepare($sql4);
  $stt4->execute();

  echo
  "<script>
  alert('옥수수알 $item1 개, 콜라액상 $item2 개가 주문되었습니다.');
	window.location.replace('equipment_supply.php');
  </script>";
}
?>
