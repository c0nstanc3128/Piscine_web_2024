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

// Mise à jour des informations de la salle de sport Omnes
if (isset($_POST['submit'])) {
    $num_salle = $_POST['num_salle'];
    $nom_salle = $_POST['nom_salle'];
    $tel_salle = $_POST['tel_salle'];
    $mail_salle = $_POST['mail_salle'];
    $id_contact_coach = $_POST['id_contact_coach'];

    // Mise à jour de la table P_Salle
    $query = "UPDATE P_Salle SET NumSalle = '$num_salle', NomSalle = '$nom_salle', TelSalle = '$tel_salle', MailSalle = '$mail_salle', IdContactCoach = $id_contact_coach WHERE IdSalle = 1";
    $result = $conn->query($query);

    if ($result) {
        // Mise à jour réussie, redirection vers la page de profil
        header('Location: profil_admin.php');
        exit;
    } else {
        echo "Erreur de mise à jour";
    }
}

// Récupération des informations actuelles de la salle de sport Omnes
$query = "SELECT * FROM P_Salle WHERE IdSalle = 1";
$result = $conn->query($query);
$salle = $result->fetch_assoc();

// Formulaire de mise à jour des informations de la salle de sport Omnes
echo "<h1>Mise à jour des informations de la salle de sport Omnes</h1>";
echo "<form method='post' action='informations_salle.php'>";
echo "<label for='num_salle'>Numéro de salle : </label>";
echo "<input type='text' name='num_salle' value='" . $salle['NumSalle'] . "' required><br>";
echo "<label for='nom_salle'>Nom de salle : </label>";
echo "<input type='text' name='nom_salle' value='" . $salle['NomSalle'] . "' required><br>";
echo "<label for='tel_salle'>Téléphone : </label>";
echo "<input type='tel' name='tel_salle' value='" . $salle['TelSalle'] . "' required><br>";
echo "<label for='mail_salle'>Courriel : </label>";
echo "<input type='email' name='mail_salle' value='" . $salle['MailSalle'] . "' required><br>";
echo "<label for='id_contact_coach'>ID du coach responsable : </label>";
echo "<input type='number' name='id_contact_coach' value='" . $salle['IdContactCoach'] . "' required><br>";
echo "<input type='submit' name='submit' value='Mettre à jour'>";
echo "</form>";