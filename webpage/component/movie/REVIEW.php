<?php
session_start();
include "../common/DB_Connect.php";
$conn = connect();
try{
	$stmt = $conn->prepare("insert into movie_review(movie_id,customer_id,score,contents) values (:movie_id,:customer_id,:score,:contents)");
	$stmt -> bindValue(":movie_id",$_POST['movie_id']);
	$stmt -> bindValue(":customer_id",$_SESSION['id']);
	$stmt -> bindValue("contents",$_POST['review']);
	$stmt -> bindValue(":score",$_POST['score']);
	$stmt->execute();
}catch (PDOException $e) {
	if($e->getcode()==23000){ 
		?>
		<script>
			if(confirm('이전에 작성한 리뷰가 있습니다. 바꾸시겠습니까?')==true){
				<?php
				try{
					$stmt_d = $conn->prepare("delete from movie_review where customer_id = :customer_id");
					$stmt_d -> bindValue(":customer_id",$_SESSION['id']);
					$stmt_d -> execute();
					$stmt->execute();
				} catch(PDOException $e){
					echo "string";
				}
				?>
			}else{
				alert('한 번쓴 리뷰는 수정 및 삭제만 가능합니다.');
			}
		</script>
		<?php 
	}
	else{
		echo "<script>alert('{$e->getmessage()}')</script>";
	}
}
$conn ->null;
?>
<meta http-equiv="refresh" content="0;url=movie.php?id=<?=$_POST['movie_id']?>" />
