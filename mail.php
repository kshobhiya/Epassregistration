<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'epassregistrationvalidation.php';
require 'vendor/autoload.php';
    $mail = new PHPMailer(true);
  try{
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->SMTPAuth="true";
    $mail->SMTPSecure="tls";
    $mail->Port="587";
    $mail->Username="programmingcontrol02@gmail.com";
    $mail->Password="programming02";
    $mail->isHTML(true);
    $mail->Subject="Epass Registration Confirmation";
    $mail->setFrom("programmingcontrol02@gmail.com");
    $mail->Body=" Epass has been registered successfully<br>
                  in Name:$fname $lname<br>
                  Epass has been valid for 3days from the travel date of registration";
    $mail->addAddress($email);
    $mail->Send();
        header("Location:index.php?success=mail sent successfully");
    }catch (Exception $e){
        header("Location:index.php?error=failure in sending mail");
    }
?>