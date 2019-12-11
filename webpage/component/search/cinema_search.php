<!DOCTYPE html>
<html>
<head>
	<?php
	include "../common/DB_Connect.php";
    $conn = connect();
    // 여기 name 잘모르겠어
	$stmt_search = $conn->prepare("SELECT 'name' from cinema");
	$stmt_search->execute();
	$result_search = $stmt_search->fetchAll();
	?>
	<meta charset="utf-8">
	<title>영화관검색</title>
	<script type="text/javascript" src="js/cinema_search.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
		$(function() {
			var availableCity = [
			<?php
			foreach ($result_search as $key => $value) {
				echo "\"" . $value['name'] . "\",";
			}
			?>
			];
			$("#searchbar").autocomplete({
				source: availableCity
			});
		});
	</script>
	<title>영화관검색</title>
</head>
<body>
	<!-- top -->
	<header class="service_menu">
		<ul id="gnb">
			<?php
			include "../common/top_login.php";
			?>
		</ul>
	</header>  
	<?php
	include "../common/navigator.php";
	?>

	<!--start -->
	<div class="section_title">
		<h1>영화관 검색</h1>
	</div>
	<div class="search_bar">
		<form action="" method="GET">
			<input type="text" name="q" value="<?= $_GET['q']?>" placeholder="영화관검색" id="searchbar" />
			<input type="submit" name="" value="검색" id="go" />
		</form>
	</div>
	<hr/>
	
        

</body>
</html>