<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>영화 예매</title>
	<link rel="stylesheet" type="text/css" href="../../styles/common.css" />
	<link rel="stylesheet" type="text/css" href="../../styles/purchase.css" />
	<script type="text/javascript" src="js/purchase.js"></script>
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
  	?>

	<h1>영화 예매</h1>

	<main>
		<menu>
			<p class="menu_name">MENU</p>
			<button class="menu_button" id="">영화관선택</button>
			<button class="menu_button" id="">영화선택</button>
			<button class="menu_button" id="">날짜선택</button>
			<button class="menu_button" id="">인원수선택</button>
			<button class="menu_button" id="">좌석선택</button>
			<button class="menu_button" id="">결제</button>
		</menu>
		<article>
			<form action="" method="POST">
				<section>
					<input type="" name="">
				</section>

			</form>
		</article>
	</main>
</body>
</html>