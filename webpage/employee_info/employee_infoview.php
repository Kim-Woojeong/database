<html>

<head>
  <meta charset='utf-8'>
  <link href="../common/styles/common.css" type="text/css" rel="stylesheet" />
  <link href="styles/view.css" type="text/css" rel="stylesheet" />
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
  <nav class="navbar">
    <a href="../cinema_test.html"><img src="../common/img/logo.png"></a>
    <div class="dropdown">
      <button class="dropbtn">영화
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="#">상영영화</a>
        <a href="#">상영예정영화</a>
        <a href="#">영화검색</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">이벤트
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="#">진행중</a>
        <a href="#">종료</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">영화관
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="#">영화관 찾기</a>
      </div>
    </div>
  </nav>

<?php
  $employee_id = $_GET['employee_id'];
  $view_sql = "select  from notice where employee_id = '$employee_id'";
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
            <button class="view_btn1" onclick="location.href="notice.php'">목록으로</button>
            <button class="view_btn1" onclick="location.href='noticemodify.php?notice_id=<?=$notice_id?>?>'">수정</button>
            <button class="view_btn1" onclick="location.href='noticedelete.php?notice_id=<?=$notice_id?>?>'">삭제</button>
        </div>
</html>
