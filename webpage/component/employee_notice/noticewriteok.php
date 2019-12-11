<?php
include "../common/DB_Connect.php";
$db = connect();

$title=$_POST['title'];
$content=$_POST['content'];

$st = $db->prepare("INSERT INTO notice (notice_title,content) VALUES ('$title','$content')");
$st->execute();

echo
"<script>
    window.alert('글 작성이 완료되었습니다.');
    location.replace('notice.php');
</script>";

 ?>
