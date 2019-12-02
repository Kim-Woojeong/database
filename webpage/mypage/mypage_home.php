<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="../common/styles/common.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/mypage_home.css"/>
    <title>마이페이지 < zxCINEMAxz</title>
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

    <div class="dropdown_full">
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
    </div>  <!-- dropdown_full -->

    </nav>

    <!--start -->

    <div class="page_info">
        HOME > 마이페이지
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

        <div class="watched_movie">
            <p id="watched_movie_title">내가 본 영화</p>
            <div class="watched_movie_poster">
                <div id="poster_list">
                     <p>영화 포스터</p>
</div>
                <div id="poster_list">
                     <p>영화 포스터</p>
</div>
                <div id="poster_list">
                     <p>영화 포스터</p>
</div>
            </div> <!-- watched_movie_poster -->
        </div> <!-- watched_movie -->

        <div class="my_review">
            <p id="my_review_title">내가 작성한 리뷰</p>
            <div class="my_review_box">
                <div id="review_list">
                <p>작성한 리뷰들 한문장으로 리뷰, 그 밑에 날짜 표시하기!</p>
                <p>2019.12.01</p>
</div>
            <div id="review_list">
                <p>작성한 리뷰들 한문장으로 리뷰, 그 밑에 날짜 표시하기!</p>
                <p>2019.12.02</p>
</div>
            </div>
        </div> <!-- my_review -->

    </div> <!-- right_info -->

</body>

</html>