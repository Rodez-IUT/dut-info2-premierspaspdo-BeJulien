<!DOCTYPE html>
<html>
	<head>
		<title>All users</title>
		<meta charset="utf-8 /">
	</head>
	<body>
		<?php 
			$host = 'localhost';
			$db = 'my-activities';
			$user = 'root';
			$pass = 'root';
			$charset = 'utf8mb4';

			$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
			$options = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES   => false
			];

			try {
				$pdo = new PDO($dsn, $user, $pass, $options);
			} catch (PDOException $e) {
				throw new PDOException ($e->getMessage(), (int) $e->getCode());
			}
		?>
		
		<?php
			$stmt = $pdo->query('SELECT * FROM users');

			while ($row = $stmt->fetch()) {
				echo $row['email'] . '\n';
			}
		?>
	</body>
</html>