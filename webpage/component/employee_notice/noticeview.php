<html>

<head>
  <meta charset='utf-8'>
  <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
  <link href="../../styles/noticeview.css" type="text/css" rel="stylesheet" />
</head>

<body>
  <header class="service_menu">
    <ul id="gnb">
      <?php
      include "../common/DB_Connect.php";
      include "../employee/top_login.php";
      $db=connect();
      ?>
    </ul>
  </header>
  <?php
  include "../employee/navigator.php";
  ?>
  <?php
  $notice_id = $_GET['notice_id'];
  $view_sql = "select notice_title,content from notice where notice_id = '$notice_id'";
  $view_stt=$db->prepare($view_sql);
  $view_stt->execute();
  $result = $view_stt->fetch(PDO::FETCH_ASSOC);
  ?>
  <table class="view_table">
    <tr>
      <td colspan="4" class="view_title"><?php echo $result['notice_title']?></td>
    </tr>

    <tr>
      <td colspan="4" class="view_content" valign="top">
        <?php echo $result['content']?></td>
      </tr>
    </table>


    <!-- MODIFY & DELETE -->
    <div class="view_btn">
      <button class="view_btn1" onclick="location.href="notice.php"">목록으로</button>
      <button class="view_btn1" onclick="location.href='noticemodify.php?notice_id=<?=$notice_id?>?>'">수정</button>
      <button class="view_btn1" onclick="location.href='noticedelete.php?notice_id=<?=$notice_id?>?>'">삭제</button>
    </div>
    </html>
