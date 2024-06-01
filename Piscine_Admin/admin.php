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

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $courriel = $_POST['courriel'];
    $mdp = $_POST['mdp'];

 
    $query = "SELECT * FROM D_Contact WHERE NomContact = '$nom' AND PrenomContact = '$prenom' AND MailContact = '$courriel' AND IdFonction = 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
       
        header('Location: profil_admin.php');
        exit;
    } else {
        echo "Erreur de connexion";
    }
}


if (isset($_SESSION['admin'])) {
    $nom = $_SESSION['admin']['nom'];
    $prenom = $_SESSION['admin']['prenom'];
    $courriel = $_SESSION['admin']['courriel'];

    echo "Bonjour $nom $prenom, vous êtes connecté en tant qu'administrateur.";
    echo "<br>Votre courriel : $courriel";

   
    echo "<br><br>Menu :";
    echo "<ul>";
    echo "<li><a href='ajouter_coach.php'>Ajouter un coach</a></li>";
    echo "<li><a href='supprimer_coach.php'>Supprimer un coach</a></li>";
    echo "<li><a href='creer_fichier_xml.php'>Créer un fichier XML</a></li>";
    echo "<li><a href='informations_salle.php'>Informations de la salle de sport Omnes</a></li>";
    echo "</ul>";
}

// Déconnexion
if (isset($_GET['deconnexion'])) {
    session_destroy();
    header('Location: connexion_admin.php');
    exit;
}