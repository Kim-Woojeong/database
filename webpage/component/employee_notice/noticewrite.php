<!DOCTYPE >

<html>
  <head>
    <meta charset="utf-8" />
    <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
    <link
      href="../../styles/noticewrite.css"
      type="text/css"
      rel="stylesheet"
    />
  </head>

  <body>
    <header class="service_menu">
      <ul id="gnb">
        <?php include "../common/DB_Connect.php";
      include "../employee/top_login.php";
      $db=connect();
      ?>
      </ul>
    </header>
    <?php
  include "../employee/navigator.php";
  ?>
    <form method="POST" action="noticewriteok.php">
      <table class="main">
        <tr>
          <td>
            <h2>글쓰기</h2>
          </td>
        </tr>
        <tr>
          <td>
            <table>
              <tr>
                <td>제목</td>
                <td><input type="text" name="title" /></td>
              </tr>
              <tr>
                <td>내용</td>
                <td>
                  <textarea name="content" cols="85" rows="15"></textarea>
                </td>
              </tr>
            </table>

            <center>
              <input type="submit" value="작성" />
            </center>
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
