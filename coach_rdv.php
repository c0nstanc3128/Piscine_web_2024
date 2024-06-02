
<?php
session_start();
if (!isset($_SESSION['mdp']) || $_SESSION['mdp'] !== true) {
    header("Location: testCoach.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Sportify";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$id_coach = $_SESSION['id_coach'];

$query = "SELECT r.Date_rdv, r.Heure_rdv, r.Salle_rdv, r.Document_demande, r.Digicode, r.Montant, c.Nom_client, c.Prenom_client
          FROM Rdv r
          INNER JOIN Clients c ON r.Id_client = c.Id_client
          WHERE r.Id_coach = $id_coach";

$result = $conn->query($query);

if (!$result) {
    die("Erreur lors de l'exécution de la requête : " . $conn->error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="images/logo_onglet.png" class="rounded-circle img-circle" type="image/png">
</head>
<body>
    <!-- navigateur -->
    <div class="overlay">
        <div class="navbar navbar-expand-md">
            <a href="accueil.html">
                <img src="images/logo_accueil.png" width="300px" height="80px" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="tout_parcourir.html">Tout parcourir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rechercher.html">Rechercher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mes_rdv.html">Rendez-vous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="votre_compte.html">Mon Compte</a>
                    </li>
                </ul>
            </div>
        </div>
            <main>
                <div style="font-family: Georgia, 'Times New Roman', Times, serif; color: #fff; text-align: center; margin-top: 25px;">
                    <h1>Espace coach</h1>
                </div>
                <div class="container-fluid" style="font-family: Georgia, 'Times New Roman', Times, serif; color: #fff; text-align: center; margin: 10px;">
                    <?php
                        if ($result->num_rows > 0) {
                            echo "<table>
                                    <tr>
                                        <th>Date</th>
                                        <th>Heure</th>
                                        <th>Salle</th>
                                        <th>Document demandé</th>
                                        <th>Digicode</th>
                                        <th>Montant</th>
                                        <th>Nom client</th>
                                        <th>Prénom client</th>
                                    </tr>";

                            while ($row = $result->fetch_assoc()) {
                                $date_rdv = isset($row['Date_rdv']) ? $row['Date_rdv'] : "Non disponible";
                                $heure_rdv = isset($row['Heure_rdv']) ? $row['Heure_rdv'] : "Non disponible";
                                $salle_rdv = isset($row['Salle_rdv']) ? $row['Salle_rdv'] : "Non disponible";
                                $document_demande = isset($row['Document_demande']) ? $row['Document_demande'] : "Non disponible";
                                $digicode = isset($row['Digicode']) ? $row['Digicode'] : "Non disponible";
                                $montant = isset($row['Montant']) ? $row['Montant'] : "Non disponible";
                                $nom_client = isset($row['Nom_client']) ? $row['Nom_client'] : "Non disponible";
                                $prenom_client = isset($row['Prenom_client']) ? $row['Prenom_client'] : "Non disponible";

                                echo "<tr>
                                        <td>".$date_rdv."</td>
                                        <td>".$heure_rdv."</td>
                                        <td>".$salle_rdv."</td>
                                        <td>".$document_demande."</td>
                                        <td>".$digicode."</td>
                                        <td>".$montant."</td>
                                        <td>".$nom_client."</td>
                                        <td>".$prenom_client."</td>
                                    </tr>";
                            }

                            echo "</table>";
                        } 
                        else {
                            $nom_coach = isset($_SESSION['nom_coach']) ? $_SESSION['nom_coach'] : "Non disponible";
                            echo "Vous n'avez pas de RDV, ".$nom_coach.".";
                        }

                        $conn->close();
                    ?>
                </div>
            </main>
            <!-- Footer -->
        <div class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <p>
                            <a class="footer-text">Contact</a><br>
                            <a class="footer-link" href="tel:+33144390600">+33 1 44 39 06 00</a><br>
                            <a class="footer-link" href="mailto:sportify.ssjm@gmail.com">sportify.ssjm@gmail.com</a><br>
                        </p>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                        <div class="vertical-line"></div>
                    </div>
                    <div class="col-md-3">
                        <p>
                            <a class="footer-text">Adresse</a><br>
                            <a class="footer-link" href="https://maps.app.goo.gl/5CucWAQD4ZE6sU4c6" target="_blank">10 Rue Sextius Michel, 75015 Paris, France</a><br>
                        </p>
                    </div>
                    <div class="col-md-2">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5250.732586425122!2d2.2885659!3d48.851225199999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE%20-%20Ecole%20d&#39;ing%C3%A9nieurs%20-%20Campus%20de%20Paris!5e0!3m2!1sfr!2sfr!4v1716995254795!5m2!1sfr!2sfr" width="200px" height="60px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="footer-copyright">
                            <p>
                                &copy; 2024 Copyright Sportify
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
