<?php
	// GET으로 넘겨 받은 year값이 있다면 넘겨 받은걸 year변수에 적용하고 없다면 현재 년도
	$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
	// GET으로 넘겨 받은 month값이 있다면 넘겨 받은걸 month변수에 적용하고 없다면 현재 월
	$month = isset($_GET['month']) ? $_GET['month'] : date('m');
	$date = "$year-$month-01"; // 현재 날짜
	$time = strtotime($date); // 현재 날짜의 타임스탬프
	$start_week = date('w', $time); // 1. 시작 요일
	$total_day = date('t', $time); // 2. 현재 달의 총 날짜
	$total_week = ceil(($total_day + $start_week) / 7);  // 3. 현재 달의 총 주차
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>calendar</title>
	<link href="../../styles/common.css" type="text/css" rel="stylesheet" />
	<link href="../../styles/calendar.css" type="text/css" rel="stylesheet" />
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
	<div class="wrapper">
		<div class="top">
			<?php
				$id = $_SESSION['id'];
				$name = $_SESSION['name'];

				$view_sql = "select rest_holidays from employee where employee_id = '$id'";
				$view_stt=$db->prepare($view_sql);
				$view_stt->execute();
				$result = $view_stt->fetch(PDO::FETCH_ASSOC);
			 ?>
			 <p><?=$name ?>님 달력입니다.</p>
		<!-- 현재가 1월이라 이전 달이 작년 12월인경우 -->
			<?php if ($month == 1) { ?>
		    <a href="calendar.php?year=<?php echo $year-1; ?>&month=12">◀ </a>
		  <?php } else { ?>
				<a href="calendar.php?year=<?php echo $year; ?>&month=<?php echo $month-1; ?>">◀ </a>
		  <?php } ?>

			<?php echo " $year 년 $month 월 " ?>

			<!-- 현재가 12월이라 다음 달이 내년 1월인경우 -->
			<?php if ($month == 12) { ?>
				<a href="calendar.php?year=<?php echo $year+1; ?>&month=1"> ▶</a>
			<?php } else { ?>
				<a href="calendar.php?year=<?= $year ?>&month=<?= $month+1; ?>"> ▶</a>
			<?php } ?>
		</div>


		<table border="1">
			<tr>
				<th>일</th>
				<th>월</th>
				<th>화</th>
				<th>수</th>
				<th>목</th>
				<th>금</th>
				<th>토</th>
			</tr>

			<!-- 총 주차를 반복합니다. -->
			<?php for ($n = 1, $i = 0; $i < $total_week; $i++) { ?>
				<tr>
					<!-- 1일부터 7일 (한 주) -->
					<?php for ($k = 0; $k < 7; $k++) { ?>
						<td>
							<!-- 시작 요일부터 마지막 날짜까지만 날짜를 보여주도록 -->
							<?php if ( ($n > 1 || $k >= $start_week) && ($total_day >= $n) ) { ?>
								<?php $temp = $year."-".$month."-".$n ?>
								<!-- 현재 날짜를 보여주고 1씩 더해줌 -->
								<?php $check_sql = "select * from schedule where employee_id = '$id' and schedule_date = '$temp'";
											$check_stt=$db->prepare($check_sql);
											$check_stt->execute();
											$result1 = $check_stt->fetch(PDO::FETCH_ASSOC);
								?>
								<a href="calendarview.php?scheduledate=<?=$temp?>"><?php echo $n++ ?></a>
								<?php if($result1['on_holiday']==1) { ?>
									<p>휴가</p>
								<?php } ?>
						<?php } ?>
						</td>
					<?php } ?>
				</tr>
			<?php } ?>
		</table>
		<div class="bottom">
			<p><?= $name ?>님의 남은 휴가 일수는 <?= $result['rest_holidays'] ?>일 입니다.</p>
		</div>


	</div>
</body>
</html>
