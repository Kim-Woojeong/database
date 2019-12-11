<html>

<head>
  <meta charset='utf-8'>
  <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
  <link href="../../styles/event.css" type="text/css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap&subset=korean" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poor+Story&display=swap&subset=korean" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Song+Myung&display=swap&subset=korean" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans&display=swap&subset=korean" rel="stylesheet">

</head>

<body>
  <header class="service_menu">
    <ul id="gnb">
      <?php include "../common/DB_Connect.php";
      include "../common/top_login.php";
      $db = connect();
      ?>
    </ul>
  </header>
  <?php
  include "../common/navigator.php";
  ?>

  <div id="mainWrapper">

    <ul>
      <!-- 게시판 제목 -->
      <li>진행중인 이벤트</li>
      <button class="right" type="button"><a href="eventwrite.html">글쓰기</a></button>

      <!-- 게시판 목록  -->
      <li>
        <ul id="ulTable">
          <li>
            <ul>
              <li>No</li>
              <li>제목</li>
              <li>작성일</li>
            </ul>
          </li>
          <!-- 게시물이 출력될 영역 -->
          <?php
          $info_sql = "select event_id,event_title,event_date from event";
          $info_stt = $db->prepare($info_sql);
          $info_stt->execute();
          foreach ($info_stt as $info) {
            ?>
            <li>
              <ul>
                <li><?= $info['event_id']; ?></li>
                <li><a href="eventview.php?event_id=<?= $info['event_id'] ?>"><?= $info['event_title']; ?></a></li>
                <li><?= $info['event_date']; ?></li>
              </ul>
            </li>
          <?php }
          ?>

          <!-- 게시판 페이징 영역 -->
          <li>
            <div id="divPaging">
              <div>◀</div>
              <div><b>1</b></div>
              <div>2</div>
              <div>3</div>
              <div>4</div>
              <div>5</div>
              <div>▶</div>
            </div>
          </li>

          <!-- 검색 폼 영역 -->
          <li id='liSearchOption'>
            <div>
              <select id='selSearchOption'>
                <option value='A'>제목+내용</option>
                <option value='T'>제목</option>
                <option value='C'>내용</option>
              </select>
              <input id='txtKeyWord' />
              <input type='button' value='검색' />
            </div>
          </li>

        </ul>
  </div>
</body>

</html>