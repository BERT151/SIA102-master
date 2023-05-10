<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);








    session_start();
    include('connection.php');
    $id = $_SESSION['id'];
    $sql ="SELECT * FROM account WHERE Account_ID = $id";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res) > 0){
      $row = mysqli_fetch_assoc($res);
      $fullname = $row['Name'];
      $email = $row['Email_Add'];
    }
    
    if(isset($_POST['submit'])){
        
        $message = mysqli_real_escape_string($con, $_POST['message']);

        $sql = "INSERT INTO reviewtbl (Account_ID, Comments) VALUES ($id,'$message');";
        //if insert is success
        if($result = mysqli_query($con, $sql)){
            //lagay mo dito yung phpmailer code
            //dito mo iprocess yung pagsend ng email



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
              $mail->setFrom('rfg2376@gmail.com', 'Feedback');
              $mail->addAddress($email, $fullname);     //Add a recipient             

              $mailbody = '
              <h3>Greetings, ' .$fullname. '!</h3>
                <p>Thank you for sending your thoughts to our fitness gym. </p>
                <p>We would like you to invite to our gym for more details.</p>
                <p>Thank you and God bless.</p>
                
                <p>Sincerely,</p>
                <p>RFG GODS AMDMIN</p>
                <p>RFG FITNESS GYM</p>
            
              ';
             
          
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = 'Feedback';
              $mail->Body    = $mailbody;
              $mail->AltBody = strip_tags($mailbody);
          
              $mail->send();

              header('location: index.php?feedbacksentsucess');
              die();
          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }

        }
    }else{
        header('location: index.php');
    }