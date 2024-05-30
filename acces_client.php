<?php
$servername = "120.0.0.1";
$username = "root";
$password = "";
$dbname = "piscine";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);
$uservername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_1";

// Verif la connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

if($dbname){
	$user = $_POST["username"];
    $pass = $_POST["password"];
	
	
	$sql = "SELECT * FROM d_contact WHERE (IdContact='$user' OR MailContact='$user )AND MpContact='$pass'";
    $result = mysqli_query($conn,$sql);
	
	if (mysqli_num_rows($result) > 0) {
				// Afficher la ligne correspondante
				$data = mysqli_fetch_assoc($result);
				$search_query = mysqli_real_escape_string($conn, $_POST['search']);
			
			if (mysqli_num_rows($result) > 0) {
				// Afficher la ligne correspondante
				$data = mysqli_fetch_assoc($result);
                echo "<table border=\"1\">";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>nom</th>";
                echo "<th>Prenom</th>";
                echo "<th>mail</th>";
                echo "<th>num tel</th>";
                echo "<th>mot de passe</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . $data['IdContact'] . "</td>";
                echo "<td>" . $data['NomContact'] . "</td>";
                echo "<td>" . $data['PrenomContact'] . "</td>";
                echo "<td>" . $data['MailContact'] . "</td>";
                echo "<td>" . $data['TelContact'] . "</td>";
                echo "<td>" . $data['MpContact'] . "</td>";
                echo "</tr>";
                echo "</table>";
			} else {
				echo "account does not exist";
			}
	}
}

$conn->close();
?>
