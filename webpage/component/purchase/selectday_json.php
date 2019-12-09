<?php
include "../common/DB_Connect.php";
$conn = connect();
$stmt_area = $conn->prepare("select * from movie_schedule where movie_time between now() and date_add(now(),interval 4 day)");
$stmt_area -> execute();
$result_area = $stmt_area -> fetchAll();

print "{\n  \"date\": [\n";
$type = 1;
foreach ($result_area as $key => $value) {
	if($type == 0)
		print ",\n";
	else
		$type = 0;
	print "\t{";
	print "\"movie_time\": \"" . $value['movie_time'] . "\", ";
	print "\"theater_name\": \"" . $value['theater_name'] . "\", ";
	print "\"cinema_id\": \"" . $value['cinema_id'] . "\", ";
	print "\"movie_id\": \"" . $value['movie_id'] . "\"";
	print "}";
}
print "\n  ]\n}\n";
?>
