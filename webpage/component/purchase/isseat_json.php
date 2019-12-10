<?php
include "../common/DB_Connect.php";
$conn = connect();

$stmt = $conn->prepare("select seat_number from schedule_seat where cinema_id = :cinema_id and theater_name = :theater_name and movie_time =:movie_time");
$stmt -> bindValue(":cinema_id",$_REQUEST['cinema']);
$stmt -> bindValue(":theater_name",$_REQUEST['theater']);
$stmt -> bindValue(":movie_time",$_REQUEST['time']);
$stmt -> execute();
$result = $stmt -> fetchAll();

print "{\n  \"isseat\": [\n";
$type = 1;
foreach ($result as $key => $value) {
   if($type == 0)
      print ",\n";
   else
      $type = 0;
   print "\t{";
   print "\"seat\": \"" . $value['seat_number'] . "\" ";
   print "}";
}
print "\n  ]\n}\n";
?>