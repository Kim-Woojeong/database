<!DOCTYPE html>
<html>
<head>
	<title>DBTESTING</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body style="text-align: center;">
	<div style="display: inline-block; border: 5px solid red; margin-top: 50px;  margin-bottom: 50px; padding: 50px;">
		<form action = '' method="post"  >
			<?php if(empty($_POST['username'])){ ?>
				<h1>MYSQL</h1>

				<div style="">
					<input type="text" name="username" placeholder="Input your Mysql username" value="root" class="form-control" autocomplete="off"/>
					<hr />
					<input type="text" name="password" placeholder="Input your Mysql password" value="root" class="form-control" autocomplete="off"/>
					<hr />
					<input type="text" name="DBname" placeholder="Input your DB name" class="form-control" autocomplete="off"/>
					<hr />
					<input type="text" name="query" placeholder="Input your SQL query" value="show databases" class="form-control" autocomplete="off"/>
					<hr />
					<input type="submit" name="" class="btn btn-primary"/>
				</div>
			<?php }else{
				echo "<table style='border: solid 1px black;'>";

				class TableRows extends RecursiveIteratorIterator { 
					function __construct($it) { 
						parent::__construct($it, self::LEAVES_ONLY); 
					}

					function current() {
						return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
					}

					function beginChildren() { 
						echo "<tr>"; 
					} 

					function endChildren() { 
						echo "</tr>" . "\n";
					} 
				}
				try {
					$servername = 'localhost';
					if(empty($_POST['DBname']))
						$conn = new PDO("mysql:host=$servername;", $_POST['username'], $_POST['password']);
					else{
						$DBN = $_POST['DBname'];
						$conn = new PDO("mysql:host=$servername;dbname=$DBN", $_POST['username'], $_POST['password']);
					}
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					echo "<div><h1>NOW QUERY :" . $_POST['query'] . "<h1/><div/>";
					echo "<hr />"; 
					?>
					<div style="width: 100%;">
						<input type="text" name="username" value="<?= $_POST['username']?>" placeholder="Input your Mysql username" class="form-control" autocomplete="off"/>
						<input type="text" name="password" value="<?= $_POST['password']?>" placeholder="Input your Mysql password" class="form-control" autocomplete="off"/>
						<input type="text" name="DBname" value="<?= $_POST['DBname']?>" placeholder="Input your DB name" class="form-control" autocomplete="off"/>
						<input type="text" name="query" placeholder="Input your SQL query" class="form-control" autocomplete="off"/>
						<input type="submit" name="" class="btn btn-primary"/>
						<input type="button" name="" onclick="location.href =''" value="처음" class="btn btn-danger"/>
					</div>
					<div style="">
						<?php
						echo "<hr />";
						$stmt = $conn -> prepare($_POST['query']);
						$stmt -> execute();
						$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

						$fields = array_keys($stmt->fetch(PDO::FETCH_ASSOC));
						echo "<tr>";
						foreach ($fields as $key => $value) {
							echo "<td><h5>$value</h5></td>";
						}
						echo "</tr>";
						foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
							echo $v;	
						}
					}
					catch(PDOException $e)
					{
						echo "Connection failed: " . $e->getMessage();?>
						<hr>
						<a href="">try again</a>
						<?php
					}
					$conn = null;
					echo "</table>";
				}?>
			</div>
		</form>
	</div>
	<?php if(empty($_POST['username'])){ ?>	
		<hr />
		<p>Mysql id,pw 를 입력하고 (query 에'show databases' 입력을 통해 database 검색) 혹은 (database 이름과 query 를 작성하여 mysql의 탐색 기능을 누릘 수 있습니다.)</p>
		<hr />
		<h2>UPDATE</h2>
		<p>version.1.1:내가 편할려고 기본값 수정</p>
	<?php } ?>
</body>
</html>