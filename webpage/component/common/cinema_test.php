<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
  <link href="../../styles/cinema_test_style.css" type="text/css" rel="stylesheet" />
  <script type="text/javascript" src="js/cinema_test.js"></script>
  <title>zxCINEMAxz</title>
</head>

<body>
  <header class="service_menu">
    <ul id="gnb">
      <?php include "DB_Connect.php";
      include "top_login.php";
      $conn = connect();
      ?>
    </ul>

  </header>
  <?php
  include "../common/navigator.php";
  
  ?>
  <?php
  for ($i = 1; $i < 7; $i++) {
    ?>
    <div class="ad">
      <div class="mySlides fade">
        <img src="../img/advertisement/ad<?= $i ?>.png" />
      </div>
    </div> <!-- ad -->
  <?php } ?>
  <div class="container">
    <div class="contents">
      <div class="contents_1">
        <a href = "" class = "notice">공지사항</a>
        <ol><MARQUEE scrolldelay="100">
          <?php
          $sql_notice = "select name,content from notice natural join cinema order by notice_date desc limit 5";
          $stmt_notice = $conn->prepare($sql_notice);
          $stmt_notice->execute();
          $result_notice = $stmt_notice->fetchAll();
          foreach ($result_notice as $key => $value) {
            ?>
            <li class="notices">[<?= $value['name'] ?>] <?= $value['content'] ?></li>
          <?php } ?>
        </MARQUEE></ol>
      </div>

      <div class="contents_2">
        <a href="movie" class="movie_rank">영화순위</a>
        <ol>
          <?php
          $sql_movieranking = "select movie_id,movie_name,total_audience from movie order by total_audience desc limit 10";
          $stmt_movieranking = $conn->prepare($sql_movieranking);
          $stmt_movieranking->execute();
          $result_movieranking = $stmt_movieranking->fetchAll();
          foreach ($result_movieranking  as $key => $value) {
            ?>
            <li class="ranking">[<?= $key + 1 ?>위] <a href="../movie/movie.php?id=<?= $value['movie_id'] ?>"><?= $value['movie_name'] ?></a></li>
          <?php } ?>
        </ol>
      </div>

      <div class="contents_3">
        <a href="" class="customer_rank">회원등급</a>
        <ol>
          <?php
          $sql_customerrank = "select rank_name,upgrade_standard from customer_rank order by sequence";
          $stmt_customerrank = $conn->prepare($sql_customerrank);
          $stmt_customerrank->execute();
          $result_customerrank = $stmt_customerrank->fetchAll();
          foreach ($result_customerrank  as $key => $value) {
            ?>
            <li class="ranking"><img src="../img/rank/<?= $value['rank_name'] ?>.png"><?= $value['rank_name'] ?> : <?= $value['upgrade_standard'] ?></li>
          <?php } ?>
        </ol>
      </div>
     
    </div> <!-- contents -->
    <?php
  include "../common/footer.php";
  ?>
  </div>
  

</body>

</html>