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

// Suppression d'un coach
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Suppression du coach de la table D_Contact
    $query = "DELETE FROM D_Contact WHERE IdContact = $id";
    $result = $conn->query($query);

    if ($result) {
        // Suppression réussie, redirection vers la page de profil
        header('Location: profil_admin.php');
        exit;
    } else {
        echo "Erreur de suppression";
    }
}

// Affichage de la liste des coaches
$query = "SELECT * FROM D_Contact WHERE IdFonction = 2";
$result = $conn->query($query);

echo "<h1>Liste des coaches</h1>";
echo "<table>";
echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Courriel</th><th>Supprimer</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['IdContact'] . "</td>";echo "<td>" . $row['NomContact'] . "</td>";
    echo "<td>" . $row['PrenomContact'] . "</td>";
    echo "<td>" . $row['MailContact'] . "</td>";
    echo "<td><a href='supprimer_coach.php?id=" . $row['IdContact'] . "'>Supprimer</a></td>";
    echo "</tr>";
}

echo "</table>";