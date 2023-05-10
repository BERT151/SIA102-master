<?php
      session_start();
      include('connection.php');
			$id = $_SESSION['id'];
			$sql = "SELECT * FROM account WHERE Account_ID = $id";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($result);

			$name = $row['Name'];
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);

		



		if(isset($_POST['submit'])){
			$message = mysqli_real_escape_string($con, $_POST['message']);
			$email = mysqli_real_escape_string($con, $_POST['email']);
			$subject = mysqli_real_escape_string($con, $_POST['subject']);


			$sql = "INSERT INTO contacttbl (AccountID, Message, Subject) VALUES ($id, '$message','$subject');";
			if($result = mysqli_query($con, $sql)){


				try {
					//Server settings
					$mail->isSMTP();                                            //Send using SMTP
					$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
					$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
					$mail->Username   = 'rfg2376@gmail.com';                     //SMTP username
					$mail->Password   = 'shwkqjprycnmcwlk';                               //SMTP password
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
					$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
			
					//Recipients
					$mail->setFrom('rfg2376@gmail.com', 'Send Message');
					$mail->addAddress($email, $name);     //Add a recipient             

					$mailbody = '
					<h3>Greetings, ' .$name. '!</h3>
						<p>Thank you for sending your message to our gym. </p>
						<p>We would like you to invite to our gym for more details.</p>
						<p>Thank you and God bless.</p>
						
						<p>Sincerely,</p>
						<p>RFG GODS AMDMIN</p>
						<p>RFG FITNESS GYM</p>
				
					';
				 
			
					//Content
					$mail->isHTML(true);                                  //Set email format to HTML
					$mail->Subject = 'Messages';
					$mail->Body    = $mailbody;
					$mail->AltBody = strip_tags($mailbody);
			
					$mail->send();
					echo 'Message sent Successfully';
					header('location: contact.php?MessageSentsuccessfully');
					die();
			} catch (Exception $e) {
					echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}

		}


		}else{
		header('location: index.php');
}


?>