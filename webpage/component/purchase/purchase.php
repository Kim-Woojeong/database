<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>영화 예매</title>
	<link rel="stylesheet" type="text/css" href="../../styles/common.css" />
	<link rel="stylesheet" type="text/css" href="../../styles/purchase.css" />
	<script type="text/javascript" src="js/purchase.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js" type="text/javascript"></script>
</head>
<body>
	<header class="service_menu">
		<ul id="gnb">
			<?php
			include "../top_login.php";
			?>
		</ul>
	</header>  
	<?php
	include "../common/navigator.php";
	include "../common/DB_Connect.php";
	$conn = connect();
	?>

	<!-- MAIN PAGE START -->
	<h1>영화 예매</h1>

	<main role="main">

		<!-- menu bar -->
		<menu role="role">
			<p class="menu_name">MENU</p>
			<button class="menu_button" id="" onclick="sectionselect('cinema')">영화관선택</button>
			<button class="menu_button" id="" onclick="sectionselect('movie')">영화선택</button>
			<button class="menu_button" id="" onclick="sectionselect('date')">날짜선택</button>
			<button class="menu_button" id="" onclick="sectionselect('seat')">좌석선택</button>
			<button class="menu_button" id="" onclick="sectionselect('approval')">결제</button>
		</menu>

		<!-- 다이나믹 섹션 -->
		<article>
			<form action="DEVpurchase.php" method="POST">

				<!-- 영화관 선택(option #1) -->
				<section id="cinema">
					<fieldset>
						<legend><h2>영화관 선택</h2></legend>
<!-- 						byby ss..
						<div class="area">
							<button id='A1'>서울/경기</button>
							<button id='A2'>경상도</button>
							<button id='A3'>충청도</button>
							<button id='A4'>전라도</button>
							<button id='A5'>제주도</button>
						</div> -->

						<?php
						// $area;
						$sql_area = "select cinema_id,name,road_address from cinema"; // where area = $area";
						$stmt_area = $conn->prepare($sql_area);
						// $stmt_area -> bindParam(":area",$area);
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
						<div id="movies">
							<p>영화를 선택할 수 없습니다.</p>
						</div>
						<input type="button" name="" value="다음 ㅋㅋㅋㅋㅋ 네이버말고 구글도 아니고 다음이래 ㅋㅋㅋㅋ" onclick="sectionselect('date')"/>
					</fieldset>
				</section>

				<!-- 날짜 선택(option #3) -->
				<section id="date">
					
					<input type="button" name="" value="다음" onclick="sectionselect('seat')"/>
				</section>

				<!-- 좌석 선택(option #4) -->
				<section id="seat">

					<input type="button" name="" value="다음" onclick="sectionselect('approval')"/>
				</section>

				<!-- 결재(option #5 - final) -->
				<section id="approval">
					<input type="submit" name="" value="결제하기" />
				</section>

			</form>
		</article>


	</main>
</body>
</html>