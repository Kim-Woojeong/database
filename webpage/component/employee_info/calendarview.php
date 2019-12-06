<html>

<head>
  <meta charset='utf-8'>
  <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
  <link href="../../styles/calendarview.css" type="text/css" rel="stylesheet" />
</head>

<body>
  <header class="service_menu">
    <ul id="gnb">
      <?php include "../DB_Connect.php";
      			include "../top_login.php";
      			$db=connect();
      ?>
    </ul>
  </header>
  <?php
  include "../common/navigator.php";
  ?>

<?php
  $id = $_SESSION['id'];
  $scheduledate = $_GET['scheduledate'];
  $view_sql = "select reason,employee_name from schedule natural join employee where schedule_date = '$scheduledate' and employee_id = '$id'";
  $view_stt=$db->prepare($view_sql);
  $view_stt->execute();
  $result = $view_stt->fetch(PDO::FETCH_ASSOC);
  ?>
        <table class="view_table">
          <tr>
            <td colspan="4" class="view_title"><?= $reulst['employee_name'] ?>님의 <?= $scheduledate ?>날 일정</td>
          </tr>

          <tr>
              <td colspan="4" class="view_content" valign="top">
              <?= $result['reason']?></td>
          </tr>
        </table>
</html>
