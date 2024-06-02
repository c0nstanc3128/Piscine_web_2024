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
		<div class="coach_container">
			<div id="cv-container" class="cv-container">
					<!--contenu du cv venant de cv_coach.xml-->
			</div>
		</div>
		<!-- Script pour charger le contenu du Cv -->
			<script>
				$(document).ready(function() {
					$.ajax({
						url: "cv_coach.xml",
						dataType: "xml",
						success: function(data) {
							var coachName = "Dubois Emma";
							afficherCVs(data, coachName);
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.error("Erreur lors du chargement du fichier XML: ", textStatus, errorThrown);
							alert("Erreur lors du chargement du fichier XML.");
						}
					});

					function afficherCVs(xml, coachName) {
						var cvs = $(xml).find("CV");

						var cvContainer = $("#cv-container");

						cvs.each(function() {
							var cv = $(this);
							var nom = cv.find("Nom").text();

							if (nom === coachName) {
								var formations = cv.find("Formation");
								var experiences = cv.find("Experience");

								var cvDiv = $("<div>").addClass("cv").css("background-color", "#cbcbcb").css("padding", "20px").css("border-radius", "10px");

								var headerDiv = $("<div>").addClass("header-div");
								var imageDiv = $("<div>").addClass("cv-image").css("flex", "0 0 150px").css("margin-right", "20px");
								var nameDiv = $("<div>").addClass("name-div").css("flex", "1");

								var header = $("<h2>").text(nom);
								nameDiv.append(header);
								
								var img = $("<img>").attr("src", "images/coach_fit.jpg").addClass("rounded-circle img-circle").attr("alt", "coach_basketball").css("width", "100%").css("height", "auto");
								imageDiv.append(img);

								headerDiv.append(imageDiv).append(nameDiv).css("display", "flex").css("align-items", "center").css("margin-bottom", "30px");
								cvDiv.append(headerDiv);

								var formationsContainer = $("<div>");
								formationsContainer.html("<h3 style='font-weight: bold; text-decoration: underline;'>Formations</h3>");
								formations.each(function() {
									var institution = $(this).find("Institution").text();
									var annee = $(this).find("Annee").text();
									var domaine = $(this).find("Domaine").text();

									var formationItem = $("<div>");
									formationItem.html("<p style='font-weight: bold; font-size: 18px;'>- " + institution + " :</p>" +
													   "<p style='font-weight: bold;'>" + annee + "</p>" +
													   "<p>" + domaine + "</p>");

									formationsContainer.append(formationItem);
								});
								cvDiv.append(formationsContainer);

								var experiencesContainer = $("<div>");
								experiencesContainer.html("<h3 style='font-weight: bold; text-decoration: underline;'>Expériences</h3>");
								experiences.each(function() {
									var entreprise = $(this).find("Entreprise").text();
									var periode = $(this).find("Periode").text();
									var poste = $(this).find("Poste").text();

									var experienceItem = $("<div>");
									experienceItem.html("<p style='font-weight: bold; font-size: 18px;'>- " + entreprise + " :</p>" +
														"<p style='font-weight: bold;'>" + periode + "</p>" +
														"<p>" + poste + "</p>");

									experiencesContainer.append(experienceItem);
								});
								cvDiv.append(experiencesContainer);

								cvContainer.append(cvDiv);
							}
						});
					}
				});
			</script>
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
