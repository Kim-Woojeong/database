<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>영화 예매</title>
	<link rel="stylesheet" type="text/css" href="../../styles/common.css" />
	<link rel="stylesheet" type="text/css" href="../../styles/purchase.css" />
	<script type="text/javascript" src="js/purchase.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap&subset=korean" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poor+Story&display=swap&subset=korean" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">

	<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js" type="text/javascript"></script>
</head>
<body>
	<header class="service_menu">
		<ul id="gnb">
			<?php
			include "../common/top_login.php";
			?>
		</ul>
	</header>
	<?php
	include "../common/navigator.php";
	include "../common/DB_Connect.php";
	$conn = connect();
   // $fulldate1 = date("y/m/d");
   // $fulldate2 = date("y/m/d", strtotime("+1 day", strtotime($fulldate1)));
   // $fulldate3 = date("y/m/d", strtotime("+2 day", strtotime($fulldate2)));
   // $fulldate4 = date("y/m/d", strtotime("+3 day", strtotime($fulldate3)));
   // $date1 = date("m/d");
   // $date2 = date("m/d", strtotime("+1 day", strtotime($date1)));
   // $date3 = date("m/d", strtotime("+2 day", strtotime($date1)));
   // $date4 = date("m/d", strtotime("+3 day", strtotime($date1)));
   // $week = array("일요일" , "월요일"  , "화요일" , "수요일" , "목요일" , "금요일" ,"토요일") ;
   // $yoil1 = $week[date('w',strtotime($date1))];
   // $yoil2 = $week[date('w',strtotime($date2))];
   // $yoil3 = $week[date('w',strtotime($date3))];
   // $yoil4 = $week[date('w',strtotime($date4))];
	?>

	<!-- MAIN PAGE START -->
	<h1>영화 예매</h1>

	<main role="main">

		<!-- menu bar -->
		<menu role="role">
			<p class="menu_name">MENU</p>
			<button class="menu_button" id="MENU1" onclick="sectionselect('cinema')">영화관선택</button>
			<button class="menu_button" id="MENU2" onclick="sectionselect('movie')">영화선택</button>
			<button class="menu_button" id="MENU3" onclick="sectionselect('date')">날짜선택</button>
			<button class="menu_button" id="MENU4" onclick="sectionselect('seat')">좌석선택</button>
			<button class="menu_button" id="MENU5" onclick="sectionselect('approval')">결제</button>
		</menu>

		<!-- 다이나믹 섹션 -->
		<article>
			<form action="DEVpurchase.php" method="POST">

				<!-- 영화관 선택(option #1) -->
				<section id="cinema">
					<fieldset>
						<legend><h2>영화관 선택</h2></legend>
						<?php
						$sql_area = "select cinema_id,name,road_address from cinema";
						$stmt_area = $conn->prepare($sql_area);
						?>
						<div class="road">
							<?php
							$stmt_area -> execute();
							$result_area = $stmt_area -> fetchAll();
							?>
							<select name="cinema" size="<?=count($result_area)?>" onchange = "changecinema();" id="select_cinema">
								<?php foreach ($result_area as $key => $value) { ?>
									<option value="<?=$value['cinema_id']?>"><?=$value['name']?></option>
								<?php } ?>
							</select>
						</div>
						<input type="button" name="" value="다음" onclick="sectionselect('movie')"/>
					</fieldset>
				</section>

				<!-- 영화 선택(option #2) -->
				<section id="movie">
					<fieldset>
						<legend><h2>영화선택</h2></legend>
						<h3 id="selection_movie">선택하신 영화 : 미선택</h3>
						<div id="movies">
							<p>영화를 선택할 수 없습니다.</p>
						</div>
						<input type="button" name="" value="다음" onclick="sectionselect('date')"/>
					</fieldset>
				</section>

				<!-- 날짜 선택(option #3) -->
				<section id="date">
					<fieldset>
						<legend><h2>날짜 선택</h2></legend>
						<br>
						<div id="select_day">
							<p>날짜를 선택할 수 없습니다.</p>
						</div>
						<input type="button" name="" value="다음" onclick="sectionselect('seat')"/>
					</fieldset>
				</section>

				<!-- 좌석 선택(option #4) -->
				<section id="seat">
					<fieldset>
						<legend><h2>좌석 선택</h2></legend>
						<h3 id="people">선택 인수 : 0명</h3>
						<div id="seats">
							<p>좌석을 선택할 수 없습니다.</p>
						</div>
						<input type="button" name="" value="다음" onclick="sectionselect('approval')"/>
					</fieldset>
				</section>

				<!-- 결제(option #5 - final) -->
				<section id="approval">
					<fieldset>
						<legend><h2>결제</h2></legend>
						<div id="approvals">
							<P>선행 과제를 수행해 주세요</P>
						</div>
						<input type="text" name="pay_way1" placeholder="결제수단" maxlength="2" style="width: 55px" />
						<input type="text" name="pay_way2" placeholder="카드번호 (-제외)" maxlength="16" />
						<input type="text" name="send_contact" placeholder="연락처 (-제외)" maxlength="11"/>
						<div id="coupon">
							<?php
							if(isset($_SESSION['id'])){?>
								<label>쿠폰 선택:
									<select name="coupon" onchange="usecoupon(this)">
										<option value="NULL" id="0">미선택</option>
										<?php
										$sql_coupon = "select coupon_name,discount_rate,coupon_number from coupon_box natural join coupon where customer_id = :customer_id and type = '영화' and expirate_date>now() and usage_status = 0";
										$stmt_coupon = $conn -> prepare($sql_coupon);
										$stmt_coupon -> bindValue(":customer_id",$_SESSION['id']);
										$stmt_coupon -> execute();
										$result_coupon = $stmt_coupon -> fetchAll();
										foreach ($result_coupon as $key => $value) { ?>
											<option value="<?=$value['coupon_number']?>" id='<?=$value['discount_rate']?>'><?=$value['coupon_name']?> [<?=$value['discount_rate']?>% 할인]</option>
										<?php } ?>
									</select>
								</label>
							<?php } else {?>
								<p>로그인 하시면 쿠폰을 사용하실 수 있습니다.</p>
							<?php } ?>
						</div>
						<input type="submit" name="" value="결제하기" />
					</fieldset>
				</section>

			</form>
		</article>


	</main>
</body>
</html>