<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../styles/mypage_home.css" />
    <link rel="stylesheet" type="text/css" href="../../styles/modified_info.css" />

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
                HOME > 마이페이지 > 정보수정
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
                    <div id="wrapper">
                        <form id="signInForm" action="DEVregister.php" method="post">
                            <div class="Modified_box">
                                <h2 class="big">정보수정</h2>

                                <div class="input_box">
                                    <label>
                                        <input class="input_text" id="user_Student_ID" type="text" name="ID" placeholder="ID">
                                    </label>
                                </div>

                                <div class="input_box">
                                    <label>
                                        <input class="input_text" id="user_PW" type="password" name="password" placeholder="password">
                                    </label>
                                </div>

                                <div class="input_box">
                                    <input type="radio" name="gender" value="남자" />남자
                                    <input type="radio" name="gender" value="여자" />여자
                                </div>

                                <div class="input_box">
                                    <label>
                                        <input class="input_text" id="name" type="text" name="name" placeholder="Name">
                                    </label>
                                </div>

                                <div class="input_box">
                                    <div class="location">
                                        <span class="selWrap">
                                            <select class="sel" name="selectedQuestion">
                                                <option value="서울">서울</option>
                                                <option value="경기도">경기도</option>
                                                <option value="인천">인천</option>
                                                <option value="강원도">강원도</option>
                                                <option value="충청도">충청도</option>
                                                <option value="경상도">경상도</option>
                                                <option value="전라도">전라도</option>
                                                <option value="제주도">제주도</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>

                                <div class="input_box">
                                    <label>
                                        <input class="input_text" type="text" name="location" placeholder="상세주소">
                                    </label>
                                </div>

                                <div class="input_box">
                                    <label>
                                        <input class="input_text" type="text" name="phonenumber" placeholder="연락처">
                                    </label>
                                </div>

                                <div class="input_box">
                                    <label>
                                        <input class="input_text" type="text" name="email" placeholder="이메일">
                                    </label>
                                </div>


                                <!-- <h2 class="big">생년월일</h2> -->
                                <div class="input_box">
                                    <select name="year">
                                        <?php for ($i = 1920; $i < 2020; $i++) {
                                            ?>
                                            <option value=<?= $i ?>><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                    <select name="month">
                                        <?php for ($i = 1; $i < 13; $i++) {
                                            ?>
                                            <option value=<?= $i ?>><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                    <select name="day">
                                        <?php for ($i = 1; $i < 32; $i++) {
                                            ?>
                                            <option value=<?= $i ?>><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                    </h2>
                                </div>

                                <div class="btn">
                                    <button type="submit" id="signUpBtn"> 수정완료 </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                </body>

</html>
