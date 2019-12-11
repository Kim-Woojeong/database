<html>

<head>
  <meta charset='utf-8'>
  <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
  <link href="../../styles/stockbuy.css" type="text/css" rel="stylesheet" />
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
  <div id="wrapper">
    <form id="buyingForm" action="equipmentbuyok.php" method="post">
      <div class ="container">
        <div class="input_box">
         <h2 class="big">3D안경</h2>
           <div class="location">
             <span class="selWrap">
               <select class="sel" name="select1">
                 <option value="0">0</option>
                 <option value="50">50</option>
                 <option value="100">100</option>
                 <option value="200">200</option>
                 <option value="500">500</option>
               </select>
             </span>
           </div>
       </div>
       <div class="input_box">
        <h2 class="big">유니폼</h2>
          <div class="location">
            <span class="selWrap">
              <select class="sel" name="select2">
                <option value="0">0</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="500">500</option>
              </select>
            </span>
          </div>
      </div>
      <div class="btn">
       <button type="submit" id="signUpBtn"> 완료 </button>
      </div>
    </div>
    </form>
  </div>
</html>
