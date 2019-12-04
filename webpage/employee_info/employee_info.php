<html>

<head>
  <meta charset='utf-8'>
  <link href="../common/styles/common.css" type="text/css" rel="stylesheet" />
  <link href="styles/employee_info.css" type="text/css" rel="stylesheet" />
</head>

<body>
  <header class="service_menu">
    <ul id="gnb">
      <?php include "../DB_Connect.php";
      include "../top_login.php";
      $db=connect();
      ?>
    </ul>
  </header>  
  <?php
  include "../navigator.php";
  ?>

  <div id="mainWrapper">

    <ul>
      <!-- 게시판 제목 -->
      <li>직원정보</li>

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
            <li>직원ID</li>
            <li>직원이름</li>
            <li>핸드폰번호</li>
            <li>영화관ID</li>
          </ul>
        </li>
        <!-- 게시물이 출력될 영역 -->
        <?php
        $cinema_name = "안산 중앙 1호점";
        if(isset($_POST['cinema']))
         $cinema_name = $_POST['cinema'];
       $info_sql = "select employee_id,employee_name,employee.hp,name from employee join cinema using (cinema_id) where name='$cinema_name'";
       $info_stt=$db->prepare($info_sql);
       $info_stt->execute();
       foreach($info_stt as $info){
        ?>
        <li>
          <ul>
            <li><?= $info['employee_id']; ?></li>
            <li><a href="employee_infoview.php?employee_id=<?= $info['employee_id']?>"><?= $info['employee_name']; ?></a></li>
            <li><?= $info['hp']; ?></li>
            <li><?= $info['name']; ?></li>
          </ul>
        </li>
      <?php }
      ?>
    </ul>
  </ul>
</div>
</body>

</html>
