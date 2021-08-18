<?php
/**use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 **/
$name    = isset($_REQUEST['fullname']) ? $_REQUEST['fullname'] : "";
$email   = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
$number  = isset($_REQUEST['number']) ? $_REQUEST['number'] : "";
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : "";

 $var = 'Here are your responses:<br>
    <ol><li>Name: ' .$name.'</li>
    <li> Phone: '.$number.'</li>
    <li> Email: '.$email.'</li>
    <li> Message: '.$message.'</li>
    </ol>
     ';


if ($name =="" && $email =="" && $number =="" && $message ==""){
echo "please "."<a href='index.php'>Go Back</a>"." and put in a valid details";
}

elseif ($name ==""){
    echo "please "."<a href='index.php'>Go Back</a>"." and put in your name";
}

elseif ($email ==""){
    echo "please "."<a href='index.php'>Go Back</a>"." and put in your email";
}

elseif ($number ==""){
    echo "please "."<a href='index.php'>Go Back</a>"." and put in your number";
}
elseif ($message ==""){
    echo "please "."<a href='index.php'>Go Back</a>"." and put in your message";
}

else{
    echo "Thanks for your feedback. ".$var."<a href='index.php'>Go Back</a>";
}





$posts = array();

$posts[] = array('name'=> $name, 'number'=> $number, 'email'=> $email, 'message'=> $message);
 
$response['posts'] = $posts;


$fp = fopen('responses/'.$name.'.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);




  ?>