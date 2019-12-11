<?php
session_start();

if (!isset($_SESSION['id'])) {
  ?>
  <p><a href="../employee/login.php">로그인</a>
<?php
} else {
  ?>
  <p><?= $_SESSION['id'] ?>님</a> |
    <a href="../employee/logout.php">로그아웃</a>
  </p>
<?php
}
?>
