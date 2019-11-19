<?php
$content=$_POST['content'];
$conn = new PDO("mysql:host=localhost;dbname=zxcinemaxz", "root", "root");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
	$stmt = $conn->prepare("insert into notice(cinema_id,content) values (10000,:content)");
	$stmt -> bindValue(":content",$content);
	$stmt->execute();
	$conn ->null;

} catch (PDOException $e) {
	echo $e->getMessage();
	header("Content-Type: text/html; charset=UTF-8");
	echo "<script>alert('글자도 제대로 못 적는겨? ㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋㅋ');";
	echo "window.location.replace('notice.php');</script>";
	exit;
}
?><meta http-equiv="refresh" content="0;url=notice.php" />