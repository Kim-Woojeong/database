<?php
  include "../common/DB_Connect.php";
  $db = connect();

  $event_id = $_GET['event_id'];

  $delete_sql = "delete from event where event_id = '$event_id'";
  $delete_stt=$db->prepare($delete_sql);
  $delete_stt->execute();

  echo
	"<script>
			window.alert('글이 삭제되었습니다.');
			location.replace('event.php');
	</script>";
?>
