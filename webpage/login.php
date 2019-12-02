<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link href="../common/styles/common.css" type="text/css" rel="stylesheet" />
    <link href="login.css" type="text/css" rel="stylesheet" />
    <title>zxCINEMAxz</title>
  </head>

  <body>
    <header class="service_menu">
      <ul id="gnb">
        <?php include "../DB_Connect.php";
            // include "../top_login.php";z
            $db=connect();
        ?>
      </ul>
    </header>
    <nav class="navbar">
      <a href="cinema_test.html"><img src="../common/img/logo.png"/></a>
      <div class="dropdown">
        <button class="dropbtn">
          영화
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="movie/Screening_movie.php">상영영화</a>
          <a href="movie/new_movie.php">상영예정영화</a>
          <a href="movie/all_movie.php">영화검색</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">
          이벤트
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="#">진행중</a>
          <a href="#">종료</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">
          영화관
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="#">영화관 찾기</a>
        </div>
      </div>
    </nav>
    
    <div class="container">
      <div class="loginbox">
        <form
          method="post"
          id="authForm"
          action="https://www.tistory.com/auth/login"
        >
          <input
            type="hidden"
            name="redirectUrl"
            value="https://blogpack.tistory.com/manage"
          />
          <fieldset>
            <div class="box_login">
              <div class="inp_text">
                <!-- <label for="loginId" class="screen_out">ID</label> -->
                <input
                  type="email"
                  id="loginId"
                  name="loginId"
                  placeholder="ID"
                />
              </div>
              <div class="inp_text">
                <!-- <label for="loginPw" class="screen_out">PW</label-->
                <input
                  type="password"
                  id="loginPw"
                  name="password"
                  placeholder="Password"
                />
              </div>
            </div>
            <div class="btn_login_box">
            <button type="submit" class="btn_login" disabled>로그인</button>
            </div>
            <div class="login_append">
              <div class="inp_chk">
                <!-- 체크시 checked 추가 -->
                <input
                  type="checkbox"
                  id="keepLogin"
                  class="inp_radio"
                  name="keepLogin"
                />
                <label for="keepLogin" class="lab_g">
                  <span class="img_top ico_check"></span>
                  <span class="txt_lab">로그인 상태 유지</span>
                </label>
              </div>
              <span class="txt_find">
                <a href="/member/find/loginId" class="link_find">아이디</a>
                /
                <a href="/member/find/password" class="link_find"
                  >비밀번호 찾기</a
                >
              </span>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>
