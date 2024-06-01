<?php
require('votre_compte.html');
$charset = 'utf-8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

if($_POST){
    $username = $_POST['username'];
    $message = $_POST['message'];
    $sql = "INSERT INTO messages (username, message) VALUES (?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$username, $message]);
}

$messages = $pdo->query('SELECT * FROM messages')->fetchAll();

?>

<!DOCTYPE html>
<html>
<body>

<form method="post" action="">
  Username: <input type="text" name="username"><br>
  Message: <input type="text" name="message"><br>
  <input type="submit">
</form>

<ul>
<?php foreach($messages as $message): ?>
    <li><strong><?= $message['username'] ?></strong>: <?= $message['message'] ?></li>
<?php endforeach; ?>
</ul>

</body>
</html>
