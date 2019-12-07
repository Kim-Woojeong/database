<?php
include "../common/DB_Connect.php";
$conn = connect();

$sql_cinema = 'select cinema_id from cinema';
$stmt_cinema = $conn -> prepare($sql_cinema);
$stmt_cinema -> execute();
$result_cinema = $stmt_cinema -> fetchAll();

$cinema;
$sql = "select distinct movie_id,movie_name from movie natural join movie_schedule where cinema_id = :cinema";
$stmt = $conn -> prepare($sql);
$stmt -> bindParam(":cinema",$cinema);

print "{\n  \"movies\": [\n";
$type = 1;
foreach ($result_cinema as $key => $value) {		
	if($type == 0)
		print ",\n";
	else
		$type = 0;
	print "\t{";
	print "\"cinema\": \"" . $value['cinema_id'] . "\", ";
	print "\"movie\": [";
	$cinema = $value['cinema_id'];
	$stmt -> execute();
	$result = $stmt -> fetchAll();
	$dtype = 1;
	foreach ($result as $key => $value) {
		if($dtype == 0)
			print ",";
		else
			$dtype = 0;
		print " [\"" . $value['movie_id'] . "\",\"" . $value['movie_name'] . "\"] ";
	}
	print "]\n}";
}
print "\n  ]\n}\n";
?>

