<?php
  include "../common/DB_Connect.php";
  include "../common/top_login.php";
  $db = connect();
  try{
    $stmt = $db->prepare("delete from ticketing_info where ticket_id = :ticket_id");
  	$stmt -> bindValue(":ticket_id",$_POST['ticket_id']);
    $stmt->execute();
    echo
  	"<script>
  			window.alert('예매가 취소 되었습니다.');
        window.history.back();
  	</script>";
  }
  catch(PDOException $e){
  	echo "<script>alert('취소에 실패했습니다. 오류코드:" . $e->getmessage() ."');";
  	echo "window.history.back();</script>";
  }
?>
