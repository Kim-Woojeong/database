<html>

<head>
  <meta charset='utf-8'>
  <link href="../common/styles/common.css" type="text/css" rel="stylesheet" />
  <link href="styles/calendarview.css" type="text/css" rel="stylesheet" />
</head>

<body>
  <header class="service_menu">
    <ul id="gnb">
      <?php include "../common/DB_Connect.php";
      			include "../employee/top_login.php";
      			$db=connect();
      ?>
    </ul>
  </header>
  <?php
  include "../employee/navigator.php";
  ?>

<?php
  $disabled = "";
  $id = $_SESSION['id'];
  $name = $_SESSION['name'];
  $division = $_SESIION['division'];
  $scheduledate = $_GET['scheduledate'];
  $view_sql = "select reason from schedule where schedule_date = '$scheduledate' and employee_id = '$id'";
  $view_stt=$db->prepare($view_sql);
  $view_stt->execute();
  $result = $view_stt->fetch(PDO::FETCH_ASSOC);
  ?>
        <table class="view_table">
          <tr>
            <td colspan="4" class="view_title"><?= $name ?>님의 <?= $scheduledate ?>날 일정</td>
          </tr>

          <tr>
              <td colspan="4" class="view_content" valign="top">
              <?= $result['reason']?></td>
          </tr>
        </table>

    <div class="view_btn">
      <?php if(strtotime($scheduledate) < strtotime(date("Y-m-d"))) { ?>
        <?php $disabled = "disabled"; ?>
      <?php } ?>
      <button class="view_btn1" onclick="location.href='rest.php?scheduledate=<?=$scheduledate?>'" <?=$disabled?>>휴가</button>
      <button class="view_btn1" onclick="location.href='reasonwrite.php?scheduledate=<?=$scheduledate?>'">사유적기</button>
      <button class="view_btn1" onclick="location.href='attend.php?scheduledate=<?=$scheduledate?>'" <?=$disabled?>>출근</button>
      <button class="view_btn1" onclick="location.href='close.php?scheduledate=<?=$scheduledate?>'" <?=$disabled?>>퇴근</button>
    </div>
</html>
