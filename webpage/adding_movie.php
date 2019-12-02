<?php

function Thumbnail_String($string, $user_width=86, $user_height=null)
{
	ob_start();
	ob_flush();
	flush();


	$im = imagecreatefromstring( $string );
	$orig_width = imagesx($im);
	$orig_height = imagesy($im);
	if($orig_width >= $user_width)
	{
		if(strlen($user_height) === 0)
		{
			$user_height = @round($orig_height*($user_width/$orig_width));
		}
	}
	else
	{
		$user_width = $orig_width;
		$user_height = $orig_height;
	}
	$im_new = imagecreatetruecolor( $user_width, $user_height );


	imagecopyresampled($im_new, $im, 0, 0, 0, 0, 
		$user_width, $user_height, $orig_width, $orig_height);
	imagepng($im_new);
	imagedestroy($im);
	imagedestroy($im_new);

	$data = ob_get_contents();
	ob_end_clean();

	return $data;
}


include "DB_Connect.php";
$conn=connect();
try{
	$stmt = $conn->prepare("insert into movie(movie_id,movie_name,movie_poster,rating,running_time,release_date,distributor,contents) values (:movie_id,:movie_name,:movie_poster,:rating,:running_time,:release_date,:distributor,:contents)");
	$stmt -> bindValue(":movie_id",$_POST['id']);
	$stmt -> bindValue(":movie_name",$_POST['title']);
	$file = file_get_contents($_FILES['poster']['tmp_name']);
	unlink($_FILES['poster']['tmp_name']);
	$data = Thumbnail_String($file, 500);
	$stmt -> bindValue(":movie_poster",$data);
	$stmt -> bindValue(":rating",$_POST['rating']);
	$stmt -> bindValue(":running_time",$_POST['running_time']);
	$stmt -> bindValue(":release_date",$_POST['release_date']);
	$stmt -> bindValue(":distributor",$_POST['distributor']);
	$stmt -> bindValue(":contents",$_POST['contents']);
	$stmt->execute();
	$conn ->null;
}catch (PDOException $e) {
	echo "<script>alert('오 새로운 오류다 뭐가 문제일까요? 0.2초 준다 잘 봐봐')</script>";
	echo $e->getmessage();
}
?>
<meta http-equiv="refresh" content="0;url=add_movie.php" />