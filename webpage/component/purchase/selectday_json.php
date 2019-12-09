<?php
include "../common/DB_Connect.php";
$conn = connect();
$stmt_area = $conn->prepare("select distinct cinema_id,movie_id from movie_schedule;");
$stmt_area -> execute();
$result_area = $stmt_area -> fetchAll();

$stmt = $conn->prepare("select theater_name,movie_time from movie_schedule where cinema_id = :cinema_id and movie_id = :movie_id");
$stmt -> bindParam(":cinema_id",$cinema);
$stmt -> bindParam(":movie_id",$movie);

print "{\n  \"dates\": [\n";
$type = 1;
foreach ($result_area as $key => $value) {
   if($type == 0)
      print ",\n";
   else
      $type = 0;
   print "\t{";
   print "\"cinema\": \"" . $value['cinema_id'] . "\", ";
   print "\"movie\": \"" . $value['movie_id'] . "\", ";
   print "\"theater_and_time\": [";
   $cinema = $value['cinema_id'];
   $movie = $value['movie_id'];
   $stmt -> execute();
   $result = $stmt -> fetchAll();
   $dtype = 1;
   foreach ($result as $key => $value) {
      if($dtype == 0)
         print ",";
      else
         $dtype = 0;
      print " [\"" . $value['theater_name'] . "\",\"" . $value['movie_time'] . "\"] ";
   }
   print "]\n}";
}
print "\n  ]\n}\n";
?>