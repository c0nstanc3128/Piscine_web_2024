<?php
require('votre_compte.html');
require_once('connect_to_database.php');

if($_POST){
    $username = $_POST['username'];
    $message = $_POST['message'];
    $sql = "INSERT INTO messages (username, message) VALUES ($username, $message)";
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
