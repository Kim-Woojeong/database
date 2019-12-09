<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
  <link href="../../styles/login.css" type="text/css" rel="stylesheet" />
  <title>zxCINEMAxz</title>
</head>

<body>
  <header class="service_menu">
    <ul id="gnb">
      <?php
      include "../common/DB_Connect.php";
      include "../common/top_login.php";
      $db=connect();
      ?>
    </ul>
  </header>
  <?php
  include "../common/navigator.php";
  ?>

  <div class="container">
    <div class="loginbox">
      <form
      method="post"
      id="authForm"
      action="DEVlogin.php"
      >
      <fieldset>
        <div class="box_login">
          <div class="inp_text">
            <!-- <label for="loginId" class="screen_out">ID</label> -->
            <input
            type="ID"
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
            <button type="submit" class="btn_login" ><strong>로그인</strong></button>
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
              <a href="/member/find/loginId" class="link_find">아이디/</a>
              <a href="/member/find/password" class="link_find">비밀번호 찾기</a>
            </span>
            <span class="txt_register">
              <a href="register.php">회원가입</a>
            </span>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</body>
</html>
