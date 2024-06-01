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

// Ajout d'un nouveau coach
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $courriel = $_POST['courriel'];
    $mdp = $_POST['mdp'];
    $id_fonction = 2; // ID de la fonction "coach"

    // Insertion du nouveau coach dans la table D_Contact
    $query = "INSERT INTO D_Contact (NomContact, PrenomContact, MailContact, MpContact, IdFonction) VALUES ('$nom', '$prenom', '$courriel', '$mdp', $id_fonction)";
    $result = $conn->query($query);

    if ($result) {
        // Ajout réussi, redirection vers la page de profil
        header('Location: profil_admin.php');
        exit;
    } else {
        echo "Erreur d'ajout";
    }
}

// Formulaire d'ajout de coach
echo "<h1>Ajouter un nouveau coach</h1>";
echo "<form method='post' action='ajouter_coach.php'>";
echo "<label for='nom'>Nom : </label>";
echo "<input type='text' name='nom' required><br>";
echo "<label for='prenom'>Prénom : </label>";
echo "<input type='text' name='prenom' required><br>";
echo "<label for='courriel'>Courriel : </label>";
echo "<input type='email' name='courriel' required><br>";
echo "<label for='mdp'>Mot de passe : </label>";
echo "<input type='password' name='mdp' required><br>";
echo "<input type='submit' name='submit' value='Ajouter'>";
echo "</form>";