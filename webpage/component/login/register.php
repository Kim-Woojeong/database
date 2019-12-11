<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<link rel="stylesheet" href="../../styles/register.css">
<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Noto+Sans+KR&display=swap&subset=korean" rel="stylesheet">
<link href="../../styles/common.css" type="text/css" rel="stylesheet" />
<link href="../../styles/register.css" type="text/css" rel="stylesheet" />
<title>Sign-Up</title>

<head>
  <title>register</title>
</head>

<body>
  <?php
  include "../common/navigator.php";
  ?>

  <div id="wrapper">

    <form id="signInForm" action="DEVregister.php" method="post">
      <div class="Modified_box">
        <h2 class="big">회원가입</h2>

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
          <button type="submit" id="signUpBtn"> Sign Up </button>
        </div>

      </div>
    </form>
  </div>
</body>

</html>