<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../styles/mypage_home.css" />
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
            $rank = $_SESSION['rank'];
            $need = 0;
            $view_sql = "select count(ticket_id) from ticketing_info where customer_id = '$id'";
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
                HOME > 마이페이지
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

                <div class="right_info">

                    <div class="watched_movie">
                      <?php $d_sql = "select movie_id from ticketing_info natural join movie_schedule where customer_id = '$id'";
                      $d_stt=$db->prepare($d_sql);
                      $d_stt->execute();?>
                        <p id="right_info_title">
                            - - - - - - - 본 영화 - - - - - - -
                        </p>

                        <div class="watched_movie_poster">
                          <?php foreach ($d_stt as $v) {?>
                            <div id="poster_list" class="first_movie">
                                <img src="../img/movie/movie_<?=$movie_id?>.jpeg" alt="image">
                            </div>
                          <?php } ?>
                        </div> <!-- watched_movie_poster -->

                    </div> <!-- watched_movie -->

                    <div class="my_review">
                      <?php $view_sql = "select movie_name,written_time,score,contents from movie_review natural join movie where customer_id = '$id'";
                      $view_stt=$db->prepare($view_sql);
                      $view_stt->execute();?>
                        <p id="right_info_title">
                            - - - - - - 작성한 리뷰 - - - - - - </p>
                        <div class="my_review_box">
                          <?php foreach ($view_stt as $view) { ?>
                            <div id="review_list">
                                <p id="title"><?=$view['movie_name']?></p>

                                <p> <?=$view['contents']?> </p>
                                <p> <?=$view['score']?> | <?=$view['written_time']?></p>

                            </div>
                          <?php } ?>
                        </div> <!-- my_review_box -->
                    </div> <!-- my_review -->

                </div> <!-- right_info -->
            </div> <!-- down_info -->
            <!-- </div> -->
            </body>

</html>
