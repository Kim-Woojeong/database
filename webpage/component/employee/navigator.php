<link href="../../styles/navigator.css" type="text/css" rel="stylesheet" />

<?php
  session_start();
  if($_SESSION['division'] == "영화관장"){ ?>
    <nav class="navbar">
      <a href="../common/cinema_test.php"><img src="../img/logo.png"></a>

      <div class="dropdown">
        <button class="dropbtn" id="first">직원
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="../employee/register.php">직원추가</a>
          <a href="../employee_info/calendar.php">직원달력</a>
          <a href="../employee_info/employee_info.php">직원정보</a>
        </div>
      </div>
      <div class="dropdown" id="second">
        <button class="dropbtn">영화
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="..//event.php">영화추가</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn" id="third">금융
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="../account/management.php">매출</a>
        </div>
      </div>
      <div class="dropdown" id="fourth">
        <button class="dropbtn">이벤트/공지사항
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="../employee_event/event.php">이벤트목록</a>
          <a href="../employee_notice/notice.php">공지사항목록</a>
        </div>
      </div>
      <div class="dropdown" id="fifth">
        <button class="dropbtn">재고/비품
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="../supply/stock_supply.php">재고확인</a>
          <a href="../supply/equipment_supply.php">비품확인</a>
        </div>
      </div>
      <div class="dropdown" id="sixth">
        <button class="dropbtn">쿠폰
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="../coupon/make_coupon.php">쿠폰생성</a>
          <a href="../coupon/give_coupon.php">쿠폰지급</a>
        </div>
      </div>
    </nav>
  <?php } else {?>
    <nav class="navbar">
      <a href="../common/cinema_test.php"><img src="../img/logo.png"></a>

      <div class="dropdown">
        <button class="dropbtn" id="first">직원
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="../employee_info/calendar.php">직원달력</a>
        </div>
      </div>
    </nav>
  <?php } ?>
