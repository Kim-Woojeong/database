<?php
  session_start();

  if(!isset($_SESSION['id']))
  {
?>
  <p><a href="../login/login.php">로그인</a> |
    <a href="#">회원가입</a></p>
<?php
  }
  else
  {
?>
  <p><?=$_SESSION['id']?>님</a> |
    <a href="#">로그아웃</a></p> |
    <a href="#">마이페이지</a><p>
<?php
  }
?>
