<html>

<head>
  <meta charset='utf-8'>
  <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
  <link href="../../styles/employee_info.css" type="text/css" rel="stylesheet" />
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
      <li>직원정보</li>

      <!-- 영화관 별로 -->
      <div class="sorting_cinema">
        <form action="" method="POST">
         <select name="cinema">
          <option value="1000000" <?php if($_POST['cinema']=="1000000") echo "selected=\"selected\""?>>안산 중앙 1호점</option>
          <option value="1000001" <?php if($_POST['cinema']=="1000001") echo "selected=\"selected\""?>>zx여수xz</option>
          <option value="1000002" <?php if($_POST['cinema']=="1000002") echo "selected=\"selected\""?>>강남</option>
        </select>
        <button type="submit">찾기</button>
      </form>
    </div>

    <!-- 게시판 목록  -->
      <ul id="ulTable">
        <li>
          <ul>
            <li>품목이름</li>
            <li>남은수</li>
            <li>지금까지 구매수</li>
            <li>구매액</li>
          </ul>
        </li>
        <!-- 게시물이 출력될 영역 -->
        <?php
        $cinema_name = 1000000;
        if(isset($_POST['cinema']))
         $cinema_name = $_POST['cinema'];
       $info_sql = "select stock_name,amount,total,cinema_id from stock natural join cinema where cinema_id='$cinema_name'";
       $info_stt=$db->prepare($info_sql);
       $info_stt->execute();
       foreach($info_stt as $info){
         $temp = $info['total'] *40000;
         if($info['stock_name']=='옥수수알')
          $temp = $info['total']*15000;
        ?>
        <li>
          <ul>
            <li><?= $info['stock_name']; ?></li>
            <li><?= $info['amount']; ?></li>
            <li><?= $info['total']; ?></li>
            <li><?= $temp; ?></li>
          </ul>
        </li>
      <?php }
      ?>
    </ul>
  </ul>
  <button type="button" onclick="location.href='stockbuy.php'">주문하러가기</button>
</div>
</body>

</html>
