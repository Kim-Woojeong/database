<!DOCTYPE>

<html>

<head>
  <meta charset='utf-8'>
  <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
  <link href="../../styles/reasonwrite.css" type="text/css" rel="stylesheet" />
</head>

<body>
  <header class="service_menu">
    <ul id="gnb">
      <?php include "../common/DB_Connect.php";
      			include "../common/top_login.php";
      			$db=connect();
            $id=$_SESSION['id'];
            $scheduledate = $_GET['scheduledate']
      ?>
    </ul>
  </header>
  <?php
  include "../common/navigator.php";
  ?>
  <form method="POST" action="reasonwriteok.php?scheduledate=<?=$scheduledate?>?>">
    <table class = "main">
      <tr>
        <td>
          <h2>일정쓰기</h2>
        </td>
      </tr>
      <tr>
        <td>
          <table>
            <tr>
              <td>내용</td>
              <td><textarea name="reason" cols="85" rows="15"></textarea></td>
            </tr>
          </table>

          <center>
            <input type="submit" value="작성">
          </center>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>
