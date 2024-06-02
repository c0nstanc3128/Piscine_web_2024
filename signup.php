<?php

	$showAlert = false;
	$showError = false;
	$exists = false;

	require_once('connect_to_database.php');

	// Code written below is a step taken
	// to check that our Database is
	// connected properly or not. If our
	// Database is properly connected we
	// can remove this part from the code
	// or we can simply make it a comment
	// for future reference.

		if ($conn) {
			echo "success";
		} else {
			die("Error" . mysqli_connect_error());
		}

function sign_up(){

		//seulement des comptes clients peuvent etre créer 
		$user_id = $_POST["user_id"];
		$tel = $_POST["num_tel"];
		$mail = $_POST["email"];
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$password = $_POST["password"];
		$cpassword = $_POST["cpassword"];

		$sql = "Select * from `d_contact` where `IdContact`='$user_id' and `MailContact`='$mail'";
		$sql_admin = "select * from `d_contact`";
		
		$res_admin =mysqli_query($conn,$sql_admin);
		$result = mysqli_query($conn, $sql);

		$row = mysqli_num_rows($result);
		$rows_admin = mysqli_num_rows($res_admin);
		
		if ($row == 0)//l'ID n'existe pas on peut ainsi 
			{
			if (($password == $cpassword) && $exists == false) {

				// Password Hashing is used here. et la fonction du compte est mise a 3 (client)
				$sql = "INSERT INTO `d_contact` (`IdContact`,`MailContact`,`MpContact`,`FonctionContact`,`NomContact`,`PrenomContact`)
				VALUES ('$username','$mail','$Password',3,'$nom','$prenom')";

				$result = mysqli_query($conn, $sql);
				
				//source https://github.com/PHPMailer/PHPMailer/blob/master/examples/mail.phps
				//envoie d'un mail de confirmation de la creation du compte
					
				/*	$mail = new PHPMailer(true);
					while($data = mysqli_fetch_assoc($result))) {
						try {
							// Paramètres du serveur
							$mail->SMTPDebug = 2;                                 
							$mail->isSMTP();                                      
							$mail->Host = ;															//ajouter les mail de contact  
							$mail->SMTPAuth = true;                               
							$mail->Email = .$row['MailContact'];    
							$mail->Id= .$row['IdContact'];							
							$mail->SMTPSecure = 'tls';
							$mail->Port = 587;
							
							// Destinataires
							$mail->setFrom(Host, 'Mailer');
							$mail->addAddress('joe@example.net', 'Joe User');
							
							// Contenu
							$mail->isHTML(true);                                  
							$mail->Subject = 'Here is the subject';
							$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
							$mail->Body .= "<br>ID: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
						}
					}*/
				
				use PHPMailer\PHPMailer\PHPMailer;

					require '../vendor/autoload.php';

					//Create a new PHPMailer instance
					$mail = new PHPMailer();
					//Set who the message is to be sent from
					$mail->setFrom('contact@sportify.fr', 'First Last');   
					//Set an alternative reply-to address
					//$mail->addReplyTo('replyto@example.com', 'First Last');
					//Set who the message is to be sent to
					$mail->addAddress(.$row['MailContact']., .$row['NomContact']. .$row['PrenomContact'].);
					//Set the subject line
					$mail->Subject = 'Sportify - Création de compte ';
					//Replace the plain text body with one created manually
					$mail->AltBody = 'Votre compte Sportify a bien été créer.  Votre ID est ';
					$mail->AltBody = "<br>ID: " . $row['IdContact']. "<br> - Name: " . $row['NomContact']. .$row['PrenomContact']."
					<br> - Email: " . $row['MailContact']. "<br>";
					//Attach an image file
					$mail->addAttachment('images/logospotify.png');											//mettre la bonne image

					//send the message, check for errors
					if (!$mail->send()) {
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					} else {
						echo 'Message sent!';
					}

				if ($result) {
					$showAlert = true;
				}
			} else {
				$showError = "Passwords do not match";
			}
		}
		}

		if ($row > 0) {
			$exists = "Il existe un compte utilisant ce mail ou ID, an account already exists for this email of ID";
		}

	}//end if
	$conn->close();
}
