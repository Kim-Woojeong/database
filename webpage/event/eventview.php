<html>

<head>
  <meta charset='utf-8'>
  <link href="../common/styles/common.css" type="text/css" rel="stylesheet" />
  <link href="styles/eventview.css" type="text/css" rel="stylesheet" />
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
  include "../navigator.php";
  ?>

  <?php
  $event_id = $_GET['event_id'];
  $view_sql = "select event_title,content from event where event_id = '$event_id'";
  $view_stt=$db->prepare($view_sql);
  $view_stt->execute();
  $result = $view_stt->fetch(PDO::FETCH_ASSOC);
  ?>
  <table class="view_table">
    <tr>
      <td colspan="4" class="view_title"><?php echo $result['event_title']?></td>
    </tr>

    <tr>
      <td colspan="4" class="view_content" valign="top">
        <?php echo $result['content']?></td>
      </tr>
    </table>


    <!-- MODIFY & DELETE -->
    <div class="view_btn">
      <button class="view_btn1" onclick="location.href='event.php'">목록으로</button>
      <button class="view_btn1" onclick="location.href='eventmodify.php?event_id=<?=$event_id?>?>'">수정</button>
      <button class="view_btn1" onclick="location.href='eventdelete.php?event_id=<?=$event_id?>?>'">삭제</button>
    </div>
    </html>
