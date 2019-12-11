<html>

<head>
  <meta charset='utf-8'>
  <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
  <link href="../../styles/management.css" type="text/css" rel="stylesheet" />
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

  <div id="mainWrapper">

    <ul>
      <!-- 게시판 제목 -->
      <li>매출정보</li>

      <!-- 영화관 별로 -->
      <div class="sorting_cinema">
        <form action="" method="POST">
         <select name="cinema">
          <option value="안산 중앙 1호점" <?php if($_POST['cinema']=="안산 중앙 1호점") echo "selected=\"selected\""?>>안산 중앙 1호점</option>
          <option value="zx여수xz" <?php if($_POST['cinema']=="zx여수xz") echo "selected=\"selected\""?>>zx여수xz</option>
          <option value="강남" <?php if($_POST['cinema']=="강남") echo "selected=\"selected\""?>>강남</option>
        </select>
        <button type="submit">찾기</button>
      </form>
    </div>

    <!-- 게시판 목록  -->
    <li>
      <ul id="ulTable">
        <li>
          <ul>
            <li>연도/분기</li>
            <li>급여지줄</li>
            <li>재고보충지출</li>
            <li>매점판매수익</li>
            <li>티켓판매수익</li>
            <li>관리인</li>
            <li>이익</li>
          </ul>
        </li>
        <!-- 게시물이 출력될 영역 -->
        <?php
        $cinema_name = "안산 중앙 1호점";
        if(isset($_POST['cinema']))
       $cinema_name = $_POST['cinema'];
       $info_sql = "select * from accounts_management natural join cinema where name = '$cinema_name'";
       $info_stt=$db->prepare($info_sql);
       $info_stt->execute();
       $temp = 0;
       foreach($info_stt as $info){
         $temp = $info['revenue_store'] + $info['revenue_ticket'] - $info['expend_salary'] - $info['expend_supply'] - $info['expend_admin'];
        ?>
        <li>
          <ul>
            <li><?= $info['year_quarter']; ?></li>
            <li><?= $info['expend_salary']?></li>
            <li><?= $info['expend_supply']; ?></li>
            <li><?= $info['revenue_store']; ?></li>
            <li><?= $info['revenue_ticket']; ?></li>
            <li><?= $info['expend_admin']; ?></li>
            <li><?= $temp?></li>
          </ul>
        </li>
      <?php }
      ?>
    </ul>
  </ul>
</div>
</body>

</html>
