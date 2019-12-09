<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
  <link href="../../styles/cinema_test_style.css" type="text/css" rel="stylesheet" />
  <title>zxCINEMAxz</title>
</head>

<body>
  <header class="service_menu">
    <ul id="gnb">
      <?php include "DB_Connect.php";
      include "top_login.php";
      $db=connect();
      ?>
    </ul>

  </header>
  <?php
  include "../common/navigator.php";
  ?>
  <div class="ad">
  </div> <!-- ad -->

  <div class="container">
    <div class="contents">
      <div class="contents_1">
        <p>
          <!-- <a href = "" class = "notice"><span>공지사항</span></a> -->
          <button type="button" onclick="location.href='' ">공지사항</button>
        </p>
        <p>
          <!-- <a href = "" class = "coupon"><span>쿠폰</span></a> -->
          <button type="button" onclick="location.href='' ">쿠폰</button>

        </p>
      </div>

      <div class="contents_2">
        <p>
          <a href="" class="movie_rank"><span>영화순위</span></a>
        </p>
      </div>

      <div class="contents_3">
        <p>
          <a href="" class="customer_rank"><span>회원등급</span></a>
        </p>
      </div>
    </div> <!-- contents -->
  </div>

</body>

</html>
