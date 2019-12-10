<?php
include "../common/DB_Connect.php";
$conn = connect();
$stmt_theater = $conn->prepare("select cinema_id,theater_name from theater");
$stmt_theater -> execute();
$result_theater = $stmt_theater -> fetchAll();

$stmt = $conn->prepare("select seat_number from seat where cinema_id = :cinema_id and theater_name = :theater_name");
$stmt -> bindParam(":cinema_id",$cinema);
$stmt -> bindParam(":theater_name",$theater);

print "{\n  \"seats\": [\n";
$type = 1;
foreach ($result_theater as $key => $value) {
   if($type == 0)
      print ",\n";
   else
      $type = 0;
   print "\t{";
   print "\"cinema\": \"" . $value['cinema_id'] . "\", ";
   print "\"theater\": \"" . $value['theater_name'] . "\", ";
   print "\"seat\": [";
   $cinema = $value['cinema_id'];
   $theater = $value['theater_name'];
   $stmt -> execute();
   $result = $stmt -> fetchAll();
   $dtype = 1;
   foreach ($result as $key => $value) {
      if($dtype == 0)
         print ",";
      else
         $dtype = 0;
      print " \"" . $value['seat_number'] . "\" ";
   }
   print "]\n}";
}
print "\n  ]\n}\n";
?>