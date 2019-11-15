<?php


/*$_POST["nome"] = $nome;
$_POST['email'] = $email;
$_POST['assunto']= $assunto;
$_POST['mensagem']= $mensagem;*/


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '@gmail.com';                     // SMTP username
    $mail->Password   = '@';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('@gmail.com', 'Mailer');
    $mail->addAddress('', 'Joe User');     // Add a recipient
    //$mail->addReplyTo('info@example.com', 'Information');
    $mail->addBCC('');


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST["assunto"];
    $mail->Body = "Nome:".$_POST["nome"]."<br><br>"."Email:".$_POST["email"]."<br><br>"."Mensagem:".$_POST["mensagem"];
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<p style='color:green'>Obrigado por entrar em contato</p>";
} catch (Exception $e) {
    echo "<p class='text-orange'>Sua mensagem não pôde ser enviada. Verifique seus dados!</p>";
}