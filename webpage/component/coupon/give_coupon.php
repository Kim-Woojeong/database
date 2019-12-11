<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<link rel="stylesheet" href="../../styles/register.css">
<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Noto+Sans+KR&display=swap&subset=korean"
rel="stylesheet">
<link href="../../styles/common.css" type="text/css" rel="stylesheet" />
<link href="../../styles/give_coupon.css" type="text/css" rel="stylesheet" />

<head>
	<title>쿠폰지급</title>
</head>

<body>
	<header class="service_menu">
    <ul id="gnb">
      <?php include "../common/DB_Connect.php";
      			include "../employee/top_login.php";
      			$db=connect();
						$date = date("Y-m-d h:i:s");
						$nextmonth1 = strtotime("$date +1 month");
						$nextmonth2 = strtotime("$date +2 month");
						$nextmonth3 = strtotime("$date +3 month");
						$nextmonth4 = strtotime("$date +4 month");
      ?>
    </ul>
  </header>
<?php
  include "../employee/navigator.php";
  ?>
	<div id="wrap">
    <form id="ahah" action="give_couponok.php" method="post">

			<h2 class="big">쿠폰지급하기</h2>

			<div class ="left">
				<fieldset>
				  <legend>쿠폰 목록</legend>
					<?php
					$info_sql = "select coupon_name from coupon";
          $info_stt=$db->prepare($info_sql);
          $info_stt->execute();
          foreach($info_stt as $info){ ?>
				  <input type="radio" name="coupon_name" value="<?= $info['coupon_name']?>"/> <?=$info['coupon_name']?><br>
					<?php }?>
				</fieldset>
			</div>

			<div class="input_box">
				<h2 class="big">고객이름</h2>
				<label>
				 <input class="input_text" type="text" name="id" placeholder="고객아이디">
			 </label>
		 </div>

		 <div class="input_box">
 		 <h2 class="big">쿠폰기간</h2>
 		 <div class="rate">
 			 <span class="selWrap">
 				 <select class="sel" name="selecte">
 					 <option value="<?=date("Y-m-d h:i:s",$nextmonth1)?>"><?=date("Y-m-d h:i:s",$nextmonth1)?></option>
					 <option value="<?=date("Y-m-d h:i:s",$nextmonth2)?>"><?=date("Y-m-d h:i:s",$nextmonth2)?></option>
					 <option value="<?=date("Y-m-d h:i:s",$nextmonth3)?>"><?=date("Y-m-d h:i:s",$nextmonth3)?></option>
					 <option value="<?=date("Y-m-d h:i:s",$nextmonth4)?>"><?=date("Y-m-d h:i:s",$nextmonth4)?></option>
 				 </select>
 			 </span>
 		 </div>
 	 </div>

			<div class="btn">
       <button type="submit" id="signUpBtn"> 완료 </button>
      </div>

		</form>
	</div>
</body>

</html>
