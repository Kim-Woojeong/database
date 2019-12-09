<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../styles/mypage_home.css" />
    <link rel="stylesheet" type="text/css" href="../../styles/modified_info.css" />

    <!-- modified_info.css 로 변경하기!!!! -->
    <title>정보수정 < zxCINEMAxz</title> </head> <body>
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
                HOME > 마이페이지 > 정보수정
            </div> <!-- page_info -->
            <div class="top_info">
                <p>
                    안녕하세요 _____님<br />
                    고객님의 등급은 ______ 입니다.<br />
                    다음등급까지 __번의 영화예매가 남아있습니다.<br />
                </p>
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
                <p>정보수정은 Costumer_info 테이블에서 정보가져오기 >> 연락처, 생년월일, 주소만 일단 가져와 </p>
                나머지 수정할 사항들은 실시간으로 추가하자
            </div> <!-- right_info -->

            </body>

</html>