<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
#Receive user input
$email_address = $_POST['email_address'];
$feedback = $_POST['feedback'];
$headers = "From: $email_address";

#Filter user input
function filter_email_header($form_field) {  
return preg_replace('/[nr|!/<>^$%*&]+/','',$form_field);
}

$email_address  = filter_email_header($email_address);
$mail = new PHPMailer(true);
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'microclubwebsite@gmail.com';                     //SMTP username
    $mail->Password   = 'projetpweb';                               //SMTP password
    #$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS ;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('microclubwebsite@gmail.com', 'Mailer');
    $mail->addAddress('contact@microclub.com', 'site owner');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->headerLine($headers, 1);
    $mail->Subject = 'Feedback Form Submission';
    $mail->Body    = $feedback;
    $mail->AltBody = $feedback;

    $email_sent = $mail->send();


$_SESSION["email_sent"] = $email_sent;
echo $email_sent;
session_write_close();
header("location: index.php#footer", true);
exit();
