<?php
  include "../common/DB_Connect.php";
  include "../employee/top_login.php";
  $db = connect();

  $scheduledate = $_GET['scheduledate'];
  $id = $_SESSION['id'];

  $co_sql = "select rest_holidays from employee where employee_id = '$id'";
  $co_stt=$db->prepare($co_sql);
  $co_stt->execute();
  $result1 = $co_stt->fetch(PDO::FETCH_ASSOC);
  if($result1['rest_holidays']<=0) {
    echo
    "<script>
        window.alert('잔여 휴가일수가 모자릅니다');
        location.replace('calendar.php');
    </script>";
  }
  else {
    $rest_sql = "select * from schedule where schedule_date = '$scheduledate' and employee_id = '$id'";
    $rest_stt=$db->prepare($rest_sql);
    $rest_stt->execute();
    $result = $rest_stt->fetch(PDO::FETCH_ASSOC);
    if(!$result) {
      $rest2_sql = "insert into schedule (schedule_date,employee_id,on_holiday) values ('$scheduledate',$id,1)";
      $rest2_stt=$db->prepare($rest2_sql);
      $rest2_stt->execute();

      $de_sql = "update employee natural join schedule set rest_holidays=rest_holidays-1 where employee_id = $id and schedule_date='$scheduledate'";
      $de_stt=$db->prepare($de_sql);
      $de_stt->execute();
      echo
    	"<script>
    			window.alert('휴가 사용이 완료되었습니다.');
    			location.replace('calendar.php');
    	</script>";
    }
    else if ($result['on_holiday']==1) {
      echo
    	"<script>
    			window.alert('이미 휴가사용을 하였습니다.');
    			location.replace('calendar.php');
    	</script>";
    }
    else {
      $rest1_sql = "update schedule set closing_time=now() and on_holiday=1 where employee_id = $id and schedule_date='$scheduledate'";
      $rest1_stt=$db->prepare($rest1_sql);
      $rest1_stt->execute();

      $de1_sql = "update employee natural join schedule set rest_holidays=rest_holidays-1 where employee_id = $id and schedule_date='$scheduledate'";
      $de1_stt=$db->prepare($de1_sql);
      $de1_stt->execute();
      echo
    	"<script>
    			window.alert('반차 사용이 완료되었습니다.');
    			location.replace('calendar.php');
    	</script>";
    }
  }
?>
