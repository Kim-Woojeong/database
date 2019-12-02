<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="../common/styles/common.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/mypage_home.css" />
    <link rel="stylesheet" type="text/css" href="styles/ticketing_list.css" />

    <!-- ticketing_list.css 로 변경하기!!!! -->
    <title>예매내역 < zxCINEMAxz</title>
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
                <a href="Screening_movie.php">상영영화</a>
                <a href="new_movie.php">상영예정영화</a>
                <a href="all_movie.php">영화검색</a>
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
        HOME > 마이페이지 > 예매내역
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

    <div class="right_info">
        <p>현장에서 발권하실 경우 꼭 <span class="ticketing_num">예매번호</span>를 확인하세요.</p>
        <p id="can_issue">티켓판매기에서 예매번호를 입력하면 티켓을 발급받을 수 있습니다.</p>
    </div> <!-- right_info -->

</body>

</html>