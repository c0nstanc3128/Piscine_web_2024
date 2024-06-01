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


// Création d'un fichier XML pour un coach
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupération des informations du coach
    $query = "SELECT * FROM D_Contact WHERE IdContact = $id";
    $result = $conn->query($query);
    $coach = $result->fetch_assoc();

    // Récupération des formations et expériences du coach
    $query = "SELECT * FROM D_Doc WHERE IdContact = $id AND IdDocType IN (1, 2)";
    $result = $conn->query($query);

    // Création du fichier XML
    $dom = new DOMDocument('1.0', 'UTF-8');
    $root = $dom->createElement('coach');
    $dom->appendChild($root);

    // Ajout des informations du coach
    $nom = $dom->createElement('nom', $coach['NomContact']);
    $prenom = $dom->createElement('prenom', $coach['PrenomContact']);
    $root->appendChild($nom);
    $root->appendChild($prenom);

    // Ajout des formations et expériences
    while ($doc = $result->fetch_assoc()) {
        $type = $dom->createElement('type');
        $nom = $dom->createElement('nom', $doc['NomDoc']);

        if ($doc['IdDocType'] == 1) {
            $type->setAttribute('type', 'formation');
        } else {
            $type->setAttribute('type', 'experience');
        }

        $root->appendChild($type);
        $type->appendChild($nom);
    }

    // Enregistrement du fichier XML
    $dom->save('coach_' . $id . '.xml');

    // Redirection vers la page de profil
    header('Location: profil_admin.php');
    exit;
}

// Affichage de la liste des coaches
$query = "SELECT * FROM D_Contact WHERE IdFonction = 2";
$result = $conn->query($query);

echo "<h1>Liste des coaches</h1>";
echo "<table>";
echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Créer fichier XML</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['IdContact'] . "</td>";
    echo "<td>" . $row['NomContact'] . "</td>";
    echo "<td>" . $row['PrenomContact'] . "</td>";
    echo "<td><a href='creer_fichier_xml.php?id=" . $row['IdContact'] . "'>Créer fichier XML</a></td>";
    echo "</tr>";
}

echo "</table>";