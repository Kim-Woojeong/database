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
      ?>
    </ul>
  </header>
<?php
  include "../employee/navigator.php";
  ?>
	<div id="wrap">
		<
    <form id="ahah" action="make_couponok.php" method="post">
			<div class ="left">
				<fieldset>
				  <legend>쿠폰 목록</legend>
				  <input type="radio" name="cc" value="visa" checked="checked" /> Visa
				  <input type="radio" name="cc" value="mastercard" /> MasterCard
				  <input type="radio" name="cc" value="amex" /> American Express
				</fieldset>
			</div>

			<div class = "right">
				<fieldset>
				  <legend>고객 목록</legend>
				  <input type="radio" name="cc1" value="visa" checked="checked" /> Visa
				  <input type="radio" name="cc1" value="mastercard" /> MasterCard
				  <input type="radio" name="cc1" value="amex" /> American Express
				</fieldset>
			</div>

			<div class="btn">
       <button type="submit" id="signUpBtn"> 완료 </button>
      </div>

		</form>
	</div>
</body>

</html>
