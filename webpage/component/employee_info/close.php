<?php
  include "../common/DB_Connect.php";
  include "../employee/top_login.php";
  $db=connect();
  $scheduledate = $_GET['scheduledate'];
  $id = $_SESSION['id'];

  $co_sql = "select closing_time from schedule where schedule_date = '$scheduledate' and employee_id = '$id'";
  $co_stt=$db->prepare($co_sql);
  $co_stt->execute();
  $result = $co_stt->fetch(PDO::FETCH_ASSOC);
  if($result['closing_time'] != '0000-00-00 00:00:00') {
    echo
    "<script>
        window.alert('이미 퇴근하였습니다.');
        location.replace('calendar.php');
    </script>";
  }
  else {
    $insert_sql = "update schedule set closing_time = now() where schedule_date = '$scheduledate' and employee_id='$id'";
    $insert_stt=$db->prepare($insert_sql);
    $insert_stt->execute();
    $result2 = $insert_stt->fetch(PDO::FETCH_ASSOC);
    echo
    "<script>
        window.alert('퇴근하였습니다.');
        location.replace('calendar.php');
    </script>";
  }
 ?>
