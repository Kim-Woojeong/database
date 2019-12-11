<!DOCTYPE html>
<html>

<head>
	<?php
	include "../common/DB_Connect.php";
	$conn = connect();
	$stmt_search = $conn->prepare("SELECT movie_name from movie where release_date>now()");
	$stmt_search->execute();
	$result_search = $stmt_search->fetchAll();
	?>
	<meta charset="utf-8">
	<title>상영영화
		< zxCINEMAxz</title> <link href="../../styles/common.css" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../../styles/movie_search.css" />
		<link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap&subset=korean" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poor+Story&display=swap&subset=korean" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Song+Myung&display=swap&subset=korean" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Black+Han+Sans&display=swap&subset=korean" rel="stylesheet">

		<script type="text/javascript" src="js/movie_search.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script type="text/javascript">
			$(function() {
				var availableCity = [
					<?php
					foreach ($result_search as $key => $value) {
						echo "\"" . $value['movie_name'] . "\",";
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
		<h1>상영 예정 영화</h1>
	</div>
	<div class="search_bar">
		<form action="" method="GET">
			<input type="text" name="q" value="<?= $_GET['q'] ?>" placeholder="영화검색" id="searchbar" />
			<input type="submit" name="" value=" " id="go" />
		</form>
	</div>
	<hr />
	<div class="sorting_movie">
		<form action="" method="POST">
			<button value="total_audience desc" name="sortbutton">인기순</button>
			<button value="release_date desc" name="sortbutton">최신순</button>
			<button value="movie_name" name="sortbutton">가나다순</button>
		</form>
	</div>
	<ol class="overview_movie">
		<?php
		$order = "release_date desc";
		if (isset($_POST['sortbutton']))
			$order = $_POST['sortbutton'];
		$search = $_GET['q'];
		$stmt = $conn->prepare("SELECT * from movie where release_date>now() and movie_name like '%$search%' order by $order");
		$stmt->execute();
		$result = $stmt->fetchAll();
		if (count($result) == 0) { ?>
			<div class="none">
				<h3>
					<?php
						if (!isset($_GET['q']))
							echo "죄송합니다. 현재 상영 예정중인 영화가 없습니다.";
						else
							echo "너가 찾는 영화는 여기에 없는거 같다. 딴데 가라~";
						?>
				</h3>
			</div>
		<?php
		}
		foreach ($result as $key => $value) { ?>
			<li class="onemovie">
				<p id="num_style"><?= $key + 1 ?></p>
				<div class="wrap">
					<!-- 영화포스터 -->
					<span class="over">
						<a href="movie.php?id=<?= $value['movie_id'] ?>" class="link_info" id='content<?= $key ?>' onmousemove="View('영화 정보','content<?= $key ?>')" onmouseout="hide('content<?= $key ?>')"></a>
						<a href="../purchase/purchase.php" class="link_purchase" id="dontent<?= $key ?>" onmouseover="View('영화 예매','dontent<?= $key ?>')" onmouseout="hide('dontent<?= $key ?>')"></a>
					</span>
					<img src="../img/movie/movie_<?= $value['movie_id'] ?>.jpeg" onerror="this.src='../img/movie/movie_no_image.jpeg';" class="movie_image">
				</div>
				<p id="movie_name"><?= $value['movie_name'] ?></p>
				<p><?= $value['release_date'] ?></p>
				<p><?= $value['rating'] ?></p>
			</li>
		<?php }
		$conn = null; ?>
	</ol>
</body>

</html>