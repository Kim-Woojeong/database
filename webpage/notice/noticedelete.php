<?php
  include "../DB_Connect.php";
  $db = connect();

  $notice_id = $_GET['notice_id'];

  $delete_sql = "delete from notice where notice_id = '$notice_id'";
  $delete_stt=$db->prepare($delete_sql);
  $delete_stt->execute();

  echo
	"<script>
			window.alert('글이 삭제되었습니다.');
			location.replace('notice.php');
	</script>";
?>
