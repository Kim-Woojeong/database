<?php
function connect()
{
	try {
		$pdo = new PDO("mysql:dbname=zxcinemaxz", "root", "");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		return $pdo;
	} catch (PDOException $e) {
		try {
			$pdo = new PDO("mysql:dbname=zxcinemaxz", "root", "root");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			return $pdo;
		} catch (PDOException $e) {
			echo $e->getmessage();
		}
	}
}
?>