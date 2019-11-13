<!DOCTYPE html>
<html>
	<head>
		<title>All users</title>
		<meta charset="utf-8 /">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<?php
			$host = 'localhost';
			$db   = 'my_activities';
			$user = 'root';
			$pass = 'root';
			$charset = 'utf8mb4';
			$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
			$options = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES   => false,
			];
			try {
				 $pdo = new PDO($dsn, $user, $pass, $options);
			} catch (PDOException $e) {
				 throw new PDOException($e->getMessage(), (int)$e->getCode());
			}
		?>
		
		<h1>All users</h1>
		
		Le status_id : 
		<input type="text" name="status_id" />
		<br /><br />
		<table class="table">
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Email</th>
			<th>Status</th>
		</tr>
		<?php
			$stmt = $pdo->query('SELECT users.id, username, email, name FROM users JOIN status ON status.id = users.status_id WHERE status_id = 2 AND username LIKE "e%" ORDER BY username');
			while ($row = $stmt->fetch()) {
				echo '<tr>';
				echo '<td>' . $row['id'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['name'] . '</td>';
				echo '</tr>';
			}
		?>
		</table>
	</body>
</html>