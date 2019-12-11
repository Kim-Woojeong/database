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
	<link href="../../styles/common.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="js/cinema_search.js"></script>
	<link rel="stylesheet" type="text/css" href="../../styles/cinema_search.css" />
	<link rel="stylesheet" type="text/css" href="../../styles/movie_search.css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap&subset=korean" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poor+Story&display=swap&subset=korean" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Song+Myung&display=swap&subset=korean" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Black+Han+Sans&display=swap&subset=korean" rel="stylesheet">
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
			<input type="text" name="q" value="<?= $_GET['q'] ?>" placeholder="영화관검색" id="searchbar" />
			<input type="submit" name="" value=" " id="go" />
		</form>
		<hr />
	</div>

	<div class="all_cinema">
		<?php
		$conn = connect();
		$search = $_GET['q'];
		$stmt = $conn->prepare("SELECT name FROM cinema WHERE name like '%$search%'");
		$stmt->execute();
		$row = $stmt->fetchAll();
		foreach ($row as $key => $value) { ?>
			<p class="cinema_name"><a href="#"><?= $value['name']; ?></a></p>

		<?php } ?>
	</div>


</body>

</html>