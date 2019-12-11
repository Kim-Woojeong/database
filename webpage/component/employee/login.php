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
      include "../employee/top_login.php";
      $db=connect();
      ?>
    </ul>
  </header>
  <?php
  include "../employee/navigator.php";
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
          </div>
          <div class="btn_login_box">
            <button type="submit" class="btn_login" >로그인</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</body>
</html>
