<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$name    = isset($_REQUEST['fullname']) ? $_REQUEST['fullname'] : "";
$email   = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
$number  = isset($_REQUEST['number']) ? $_REQUEST['number'] : "";
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : "";


if ($name !="" && $email && $number && $message){
//echo "here";die;
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'aduramimo@gmail.com';                     //SMTP username
    $mail->Password   = 'pqsnrjldvcyzuihi';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('aduramimo@gmail.com', 'Aduramimo');
    $mail->addAddress($email,$name);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('aduramimo@gmail.com', 'Reply');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    $var = 'Here are your responses:<br>
    <ol><li>Name: ' .$name.'</li>
    <li> Phone: '.$number.'</li>
    <li> Email: '.$email.'</li>
    <li> Message: '.$message.'</li>
    </ol>
     ';
    // echo $var;die;
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Thanks for contacting me';
    $mail->Body    = 'Here are your responses:<br>
    <ol><li>Name: ' .$name.'</li>
    <li> Phone: '.$number.'</li>
    <li> Email: '.$email.'</li>
    <li> Message: '.$message.'</li>
    </ol>
     ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

  
}


else echo "please put in a valid name";


  ?>