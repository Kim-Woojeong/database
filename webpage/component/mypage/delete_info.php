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
                    ?>
                </ul>
            </header>
            <?php
            include "../common/navigator.php";
            ?>

            <!--start -->
            <div class="page_info">
                HOME > 마이페이지 > 회원탈퇴
            </div>

            <div class="section_title">
                <h1>MY PAGE</h1>
            </div>
            <hr />

            <div class="top_info">
                <p>

                    안녕하세요
                    <span id="id_info">김우정</span> 님,

                </p>
                <p id="sub_info"> 고객님의 등급은 <span id="mypage_info">VIP</span> 입니다.<br />
                    다음등급까지 <span id="mypage_info">3</span>번의 영화예매가 남아있습니다.<br />
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
                        <li><a href="change_pw.php">비밀번호 변경</a></li>
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

                </div> <!-- right_info -->

                </body>

</html>