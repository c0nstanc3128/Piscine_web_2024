<!DOCTYPE html>
<html>
	<head>
		<title>CV des Coachs</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
                <div class="container-fluid" style="margin-top: 18px; margin-bottom: 18px;">
                    <table>
                        <tr>
                            <th class="th-personnel">Nom</th>
                            <th class="th-personnel">Prénom</th>
                            <th class="th-personnel">Type d'activité</th>
                            <th class="th-personnel">Activité</th>
                            <th class="th-personnel">Bureau</th>
                            <th class="th-personnel">Salle</th>
                            <th class="th-personnel">Téléphone</th> 
                            <th class="th-personnel">Courriel</th>
                            <th class="th-personnel">Photo</th>
                            <th class="th-personnel">Voir le CV</th>
                            <th class="th-personnel">Lien vers la page</th>
                        </tr>
                        <?php
                            if(isset($_POST['recherche'])) {
                                $recherche = $_POST['recherche'];

                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "Sportify";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Connexion échouée: " . $conn->connect_error);
                                }

                                $recherche = utf8_encode($recherche);

                                $recherche = mysqli_real_escape_string($conn, $recherche);

                                $sql = "SELECT c.*, a.Type_activite, a.Sport, a.Salle
                                        FROM Coach c
                                        INNER JOIN Activites a ON c.Id_activite = a.Id_activite
                                        WHERE c.Nom_coach LIKE '%$recherche%'
                                            OR c.Prenom_coach LIKE '%$recherche%'
                                            OR a.Salle LIKE '%$recherche%'
                                            OR a.Categorie LIKE '%$recherche%'
                                            OR a.Sport LIKE '%$recherche%'";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
										$imagePath = $row["Photo"];
										echo "<td><img src='" . $row["Photo_coach"] . "'class='img-rounded' style='border-radius: 10%' width='150' height='150' alt='Photo coach'></td>";
                                        echo "<td>" . $row["Nom_coach"] . "</td>";
                                        echo "<td>" . $row["Prenom_coach"] . "</td>";
                                        echo "<td>" . $row["Categorie"] . "</td>";
                                        echo "<td>" . $row["Sport"] . "</td>";
                                        echo "<td>" . $row["Salle"] . "</td>";
                                        echo "<td><a class='link' href='" . $row["Lien"] . "'>" . "Cliquer ici" . "</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "Aucun résultat trouvé pour les critères de recherche.";
                                }
                                $conn->close();
                            }
                        ?>
                    </table>
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
	</body>
</html>
