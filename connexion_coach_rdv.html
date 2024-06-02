
<?php
session_start();
if (isset($_POST['valider'])) {
    if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Sportify";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connexion échouée: " . $conn->connect_error);
        }

        $email_saisi = mysqli_real_escape_string($conn, $_POST['email']);
        $mdp_saisi = mysqli_real_escape_string($conn, $_POST['mdp']);

        $query = "SELECT * FROM Coach WHERE Mail_coach = '$email_saisi' AND Mdp_coach = '$mdp_saisi'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['mdp'] = true;
            $_SESSION['id_coach'] = $row['Id_coach'];
            header("Location: coach_rdv.php");
            exit;
        } else {
            echo "Votre mot de passe ou e-mail est incorrect";
        }

        $conn->close();
    } else {
        echo "Veuillez compléter tous les champs";
    }
}
?>

<html>
<head>
    <title>Accueil</title>
     <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.js"></script>
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
                <div class="container-fluid">
                    <div class="title">
                        <h1 style="margin-top: 20px;">Connexion</h1>
                    </div>
                    <form method="POST" action="connexion_coach_rdv.php" class="container d-flex flex-column align-items-center">
                        <input style="width: 25%;" type="email" name="email" placeholder="Courriel" required>
                        <input style="width: 25%;" type="password" name="mdp" id="motdepasse" placeholder="Mot de passe" required>
                        <div class="radio-container">
                            <input type="checkbox" onclick="afficher()" id="afficher_mdp">
                            <label class="title" for="afficher_mdp">Afficher</label>
                        </div>
                        <input style="width: 25%;" type="submit" name="valider" value="Se connecter">
                    </form>
                    <div class="container" style="color: #fff; font-family: Georgia, 'Times New Roman', Times, serif; text-align: center;">
                        <p>Vous n'avez pas de compte ? Contacter un Administrateur :</p>
                        
                        <div class="container">
                            <p>- Charina Shane Luzano :</p>
                            <a class="member-link" href="mailto:charinashane.luzano@edu.ece.fr" style="font-family: Georgia, 'Times New Roman', Times, serif;">charinashane.luzano@edu.ece.fr</a>
                        </div>

                        <div class="container">
                            <p>- Constance SAMANIEGO :</p>
                            <a class="member-link" href="mailto:constance.samaniego@edu.ece.fr" style="font-family: Georgia, 'Times New Roman', Times, serif;">constance.samaniego@edu.ece.fr</a>
                        </div>

                        <div class="container">
                            <p>- David Stan :</p>
                            <a class="member-link" href="mailto:david.stan@edu.ece.fr" style="font-family: Georgia, 'Times New Roman', Times, serif;">david.stan@edu.ece.fr</a>
                        </div>

                        <div class="container">
                            <p>- Léo-Pol Bernard-Chaussé:</p>
                            <a class="member-link" href="mailto:leo-pol.bernard-chausse@edu.ece.fr" style="font-family: Georgia, 'Times New Roman', Times, serif;">leo-pol.bernard-chausse@edu.ece.fr</a>
                        </div>
                    </div>
                </div>
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
