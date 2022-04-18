<?php
require_once 'vendor/autoload.php';
require_once 'config/constants.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.seznam.cz', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail,$token){

    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Verify email</title>
    </head>
    <body>
        <div class="wrapper">
            <p>
                děkujeme za registraci. klikněte na odkaz pro ověření.
            </p>
            <a href="http://localhost//coffeeshop/register/index.php?token=' . $token . '">
                verify you email adress
            </a>
        </div>
    </body>
    </html>';

    // Create a message
$message = (new Swift_Message('verify your email address'))
  ->setFrom(EMAIL)
  ->setTo($userEmail)
  ->setBody($body, 'text/html');

// Send the message
$result = $mailer->send($message);

}
