<link href="../../styles/navigator.css" type="text/css" rel="stylesheet" />

<nav class="navbar">

  <a href="../common/cinema_test.php"><img src="../img/logo.png"></a>

  <div class="dropdown">
    <button class="dropbtn" id="first">영화
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../movie/Screening_movie.php">상영영화</a>
      <a href="../movie/new_movie.php">상영예정영화</a>
      <a href="../movie/all_movie.php">영화검색</a>
    </div>
  </div>
  <div class="dropdown" id="second">
    <button class="dropbtn">이벤트
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../event/event.php">진행중인 이벤트</a>
      <a href="../event/notice.php">공지사항</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn" id="third">영화관
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../search/cinema_search.php">영화관 검색</a>
    </div>
  </div>
  <div class="reserve">
    <button class="reservebtn" onclick="location.href = '../purchase/purchase.php'">
      ▶︎ 간편예매 GO ◀︎
      <i class="fa fa-caret-down"></i>
    </button>
  </div>
</nav>