<?php
  include "../common/DB_Connect.php";
  include "../employee/top_login.php";
  $db=connect();
  $scheduledate = $_GET['scheduledate'];
  $id = $_SESSION['id'];
  $reason=$_POST['reason'];

  $co_sql = "select * from schedule where schedule_date = '$scheduledate' and employee_id = '$id'";
  $co_stt=$db->prepare($co_sql);
  $co_stt->execute();
  $result = $co_stt->fetch(PDO::FETCH_ASSOC);
  if($result) {
    $update_sql = "update schedule set reason='$content' where employee_id=$id and schedule_date ='$scheduledate'";
    $update_stt=$db->prepare($update_sql);
    $update_stt->execute();
    $result1 = $update_stt->fetch(PDO::FETCH_ASSOC);
    echo
    "<script>
        window.alert('내용수정이 완료되었습니다.');
        location.replace('calendar.php');
    </script>";
  }
  else {
    $insert_sql = "insert into schedule (schedule_date,employee_id,reason) values ('$scheduledate',$id,'$reason')";
    $insert_stt=$db->prepare($insert_sql);
    $insert_stt->execute();
    $result2 = $insert_stt->fetch(PDO::FETCH_ASSOC);
    echo
    "<script>
        window.alert('내용작성이 완료되었습니다.');
        location.replace('calendar.php');
    </script>";
  }
 ?>
