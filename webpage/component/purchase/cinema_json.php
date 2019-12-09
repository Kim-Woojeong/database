<?php
include "../common/DB_Connect.php";
$conn = connect();
$stmt_area = $conn->prepare("select cinema_id,area,name,road_address from cinema");
$stmt_area -> execute();
$result_area = $stmt_area -> fetchAll();

print "{\n  \"cinemas\": [\n";
$type = 1;
foreach ($result_area as $key => $value) {
	if($type == 0)
		print ",\n";
	else
		$type = 0;
	print "\t{";
	print "\"ID\": \"" . $value['cinema_id'] . "\", ";
	print "\"area\": \"" . $value['area'] . "\", ";
	print "\"Name\": \"" . $value['name'] . "\", "; 
	print "\"road_address\": \"" . $value['road_address'] . "\"";
	print "}";
}
print "\n  ]\n}\n";
<<<<<<< HEAD
?>
=======
>>>>>>> 9339ea43bb6882651e0c2ca22e61e803ccac832d
