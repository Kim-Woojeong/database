<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../styles/mypage_home.css" />
    <link rel="stylesheet" type="text/css" href="../../styles/change_pw.css" />

    <!-- change_pw.css 로 변경하기!!!! -->
    <title>비밀번호 변경 < zxCINEMAxz</title>
</head>

<body>
    <!-- top -->
    <header class="service_menu">
        <ul id="gnb">
            <?php
			include "../DB_Connect.php";
			include "../top_login.php";
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
            <a href="/webpage/movie/Screening_movie.php">상영영화</a>
            <a href="/webpage/movie/new_movie.php">상영예정영화</a>
            <a href="/webpage/movie/all_movie.php">영화검색</a>
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

    <!--start -->

    <div class="page_info">
        HOME > 마이페이지 > 비밀번호 변경
    </div>    <!-- page_info -->
    <div class="top_info">
        <p>
            안녕하세요 _____님<br/>
            고객님의 등급은 ______ 입니다.<br/>
            다음등급까지 __번의 영화예매가 남아있습니다.<br/>
        </p>
    </div> <!-- top_info -->

    <div class="left_info">

         <ul class="list_1">
            <li id="left_info_title"> [마이페이지 홈] </li>
            <li><a href="mypage_home.php">마이페이지</a></li>
         </ul>  <!-- list_1 -->
<br/>
        <ul class="list_2">
            <li id="left_info_title"> [나의 예매내역] </li>
            <li><a href="ticketing_list.php">예매내역</a></li>
         </ul>  <!-- list_2 -->
<br/>
         <ul class="list_3">
            <li id="left_info_title"> [회원정보] </li>
            <li><a href="change_pw.php">비밀번호 변경</a></li>
            <li><a href="modified_info.php">정보수정</a></li>
            <li><a href="delete_info.php">회원탈퇴</a></li>
         </ul>  <!-- list_3 -->
<br/>
         <ul class="list_4">
            <li id="left_info_title"> [나의 보유쿠폰] </li>
            <li><a href="holding_coupon.php">보유쿠폰</a></li>

         </ul>  <!-- list_4 -->
         
    </div> <!-- left_info -->

    <div class="right_info edit">

    현재 비밀번호 입력받는 곳
        <div class = pw_original_box>
            <form method="POST">
                <fieldset>
                    <legend><h2>비밀번호 변경</h2></legend>
                    <input type="text" name="current_pw" placeholder="현재 비밀번호"/><br/>
                    <input type="submit">
                </fieldset>
            </form>
        </div>



   새로운 비밀번호 입력받는 곳
        <div class = pw_new_box>
            <form method="POST">
                <fieldset>
                    <legend><h2>비밀번호 변경</h2></legend>
                    <input type="text" name="new_pw" placeholder="새로운 비밀번호"/><br/>
                    <input type="text" name="new_pw_check" placeholder="새로운 비밀번호 확인"/><br/>
                    <input type="submit">
                </fieldset>
            </form>
        </div>
    </div> 

</body>

</html>