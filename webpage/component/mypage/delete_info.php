<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../styles/mypage_home.css" />
    <link rel="stylesheet" type="text/css" href="../../styles/delete_info.css" />

    <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap&subset=korean" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poor+Story&display=swap&subset=korean" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">

    <title>마이페이지 < zxCINEMAxz</title> </head> <body>
      <!-- top -->
      <header class="service_menu">
          <ul id="gnb">
              <?php
              include "../common/DB_Connect.php";
              include "../common/top_login.php";
              $db = connect();
              ?>
          </ul>
      </header>
      <?php
      include "../common/navigator.php";
      ?>

      <!--start -->

      <?php
      $id = $_SESSION['id'];
      $name=$_SESSION['name'];
      $need = 0;
      $view_sql = "select count(ticket_id),rank_name from ticketing_info natural join customer_info where customer_id = '$id'";
      $view_stt=$db->prepare($view_sql);
      $view_stt->execute();
      $result = $view_stt->fetch(PDO::FETCH_ASSOC);
      $view_movie = $result['count(ticket_id)'];
      if($view_movie<5){
        $need = 5-$view_movie;
        $sql = "update customer_info set rank_name = 'VIP' where customer_id = '$id'";
        $stt=$db->prepare($sql);
        $stt->execute();
      }
      else if ($view_movie<10) {
        $need = 10-$view_movie;
        $sql = "update customer_info set rank_name = 'RVIP' where customer_id = '$id'";
        $stt=$db->prepare($sql);
        $stt->execute();
      }
      else if ($view_movie<20) {
        $need = 20-$view_movie;
        $sql = "update customer_info set rank_name = 'VVIP' where customer_id = '$id'";
        $stt=$db->prepare($sql);
        $stt->execute();
      }
      else {
        $need = $view_movie;
        $sql = "update customer_info set rank_name = 'SVIP' where customer_id = '$id'";
        $stt=$db->prepare($sql);
        $stt->execute();
      }
      ?>
      <div class="page_info">
          HOME > 마이페이지
      </div> <!-- page_info -->
      <div class="top_info">
        <?php if($need<20) { ?>
          <p>
              안녕하세요 <?=$name?>님<br />
              고객님의 등급은 <?=$result['rank_name']?> 입니다.<br />
              다음등급까지 <?=$need?>번의 영화예매가 남아있습니다.<br />
          </p>
        <?php } else { ?>
          <p>
              안녕하세요 <?=$name?>님<br />
              고객님의 등급은 <?=$rank?> 입니다.<br />
              지금까지 <?=$need?>번의 영화를 보셨습니다.<br />
          </p>
        <?php } ?>

      </div> <!-- top_info -->

      <div class="left_info">

          <ul class="list_1">
              <li id="left_info_title"> [마이페이지 홈] </li>
              <li><a href="mypage_home.php">마이페이지</a></li>
          </ul> <!-- list_1 -->
          <br />
          <ul class="list_2">
              <li id="left_info_title"> [나의 예매내역] </li>
              <li><a href="ticketing_list.php">예매내역</a></li>
          </ul> <!-- list_2 -->
          <br />
          <ul class="list_3">
              <li id="left_info_title"> [회원정보] </li>
              <li><a href="change_pw.php">비밀번호 변경</a></li>
              <li><a href="modified_info.php">정보수정</a></li>
              <li><a href="delete_info.php">회원탈퇴</a></li>
          </ul> <!-- list_3 -->
          <br />
          <ul class="list_4">
              <li id="left_info_title"> [나의 보유쿠폰] </li>
              <li><a href="holding_coupon.php">보유쿠폰</a></li>

          </ul> <!-- list_4 -->

      </div> <!-- left_info -->

                <div class="right_info">
                    <p class="del_check">회원탈퇴를 하시겠습니까?</p>
                    <p>예 | 아니오</p>
                </div> <!-- right_info -->

                </body>

</html>
