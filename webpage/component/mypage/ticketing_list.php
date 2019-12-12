<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../../styles/mypage_home.css" />
  <link rel="stylesheet" type="text/css" href="../../styles/ticketing_list.css" />

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
    $id = $_SESSION['id'];
    $name=$_SESSION['name'];
    $rank=$_SESSION['rank'];
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

    <!--start -->
    <div class="page_info">
      HOME > 마이페이지 > 예매내역
    </div>

    <div class="section_title">
      <h1>MY PAGE</h1>
    </div>
    <hr />

    <div class="top_info">
      <p>

        안녕하세요
        <span id="id_info"><?=$name?></span> 님,

      </p>
      <p id="sub_info"> 고객님의 등급은 <span id="mypage_info"><?=$rank?></span> 입니다.<br />
        다음등급까지 <span id="mypage_info"><?=$need?></span>번의 영화예매가 남아있습니다.<br />
      </p>
    </div> <!-- top_info -->
    <hr />


    <div class="down_info">
      <div class="left_info">

        <p>
          MEMU
        </p>
        <ul class="list_1">
          <li id="left_info_title"> 마이페이지 홈 </li>
          <li><a href="mypage_home.php">마이페이지</a></li>
        </ul> <!-- list_1 -->
        <br />
        <ul class="list_2">
          <li id="left_info_title"> 나의 예매내역 </li>
          <li><a href="ticketing_list.php">예매내역</a></li>
        </ul> <!-- list_2 -->
        <br />
        <ul class="list_3">
          <li id="left_info_title"> 회원정보 </li>
          <li><a href="modified_info.php">정보수정</a></li>
          <li><a href="delete_info.php">회원탈퇴</a></li>
        </ul> <!-- list_3 -->
        <br />
        <ul class="list_4">
          <li id="left_info_title"> 나의 보유쿠폰 </li>
          <li><a href="holding_coupon.php">보유쿠폰</a></li>

        </ul> <!-- list_4 -->

      </div> <!-- left_info -->

      <!--start -->

      <div class="right_info">
        <?php 
        $d_sql = "select ticket_id,movie_name,movie_id,time,movie_time from ticketing_info natural join movie where customer_id = :customer_id";
        $d_stt=$db->prepare($d_sql);
        $d_stt->bindValue(":customer_id",$_SESSION['id']);
        $d_stt->execute();
        $super = $db -> prepare("select seat_number from schedule_seat where ticket_id = :ticket_id");
        $super -> bindParam(":ticket_id",$TT);
        ?>
        <p>현장에서 발권하실 경우 꼭 <span class="ticketing_num">예매번호</span>를 확인하세요.</p>
        <p id="can_issue">티켓판매기에서 예매번호를 입력하면 티켓을 발급받을 수 있습니다.</p>

        <?php 
        foreach($d_stt as $d) {
          $TT = $d['ticket_id'];
          $super -> execute();

          ?>
          <div class="ticket_list_container">
            <div class="list_num">
              <p>예매번호</p>
              <p><?=$d['ticket_id']?></p>
            </div>
            <div class="list_poster">
              <img src="../img/movie/movie_<?=$d['movie_id']?>.jpeg" alt="image">
            </div>
            <div class="list_movie">
              <p>영화이름 : <span class="list_movie_info"><?=$d['movie_name']?></span></p>
            </div>
            <div class="list_seat">
              <p>상영관 및 좌석 : <span class="list_movie_info"><?php 
              $type = 1;
              foreach ($super->fetchAll() as $value) {
                if($type == 0)
                  echo ",";
                else
                  $type = 0;
                echo $value['seat_number'];
              }
              ?></span></p>
            </div>
            <div class="list_date">
              <p>관람일시 : <span class="list_movie_info"><?=$d['movie_time']?></span></p>
            </div>
            <form method="POST" action="cancel.php">
              <input type="hidden" name="ticket_id" value="<?=$d['ticket_id']?>" />
              <input type="submit" name="" value="예매취소" />
            </form>
          </div>
        <?php } ?>
        <!-- ticket_list_container -->
      </div> <!-- right_info -->
    </body>
    </html>
