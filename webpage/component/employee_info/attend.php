<?php
  include "../common/DB_Connect.php";
  include "../common/top_login.php";
  $db=connect();
  $scheduledate = $_GET['scheduledate'];
  $id = $_SESSION['id'];

  $co_sql = "select attending_time from schedule where schedule_date = '$scheduledate' and employee_id = '$id'";
  $co_stt=$db->prepare($co_sql);
  $co_stt->execute();
  $result = $co_stt->fetch(PDO::FETCH_ASSOC);
  if($result) {
    echo
    "<script>
        window.alert('이미 출근하였습니다.');
        location.replace('calendar.php');
    </script>";
  }
  else {
    $insert_sql = "insert into schedule (schedule_date,employee_id,attending_time) values ('$scheduledate',$id,now())";
    $insert_stt=$db->prepare($insert_sql);
    $insert_stt->execute();
    $result2 = $insert_stt->fetch(PDO::FETCH_ASSOC);
    echo
    "<script>
        window.alert('출근하였습니다.');
        location.replace('calendar.php');
    </script>";
  }
 ?>
