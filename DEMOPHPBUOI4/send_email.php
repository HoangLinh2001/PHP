<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require_once("configmail.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $toMail = $_POST["to_email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $subject = '=?UTF-8?B?'.base64_encode($subject). '?=';

}
$template = file_get_contents('template.html');
$body = str_replace("{{NAMEUSER}}",$name,$template);
$bodyFinal = str_replace("{{CONTENT}}",$message,$body);
//get config mail
$email_username = $config['email_username'];
$email_password = $config['email_password'];
$email_smtp = $config['email_smtp'];
$email_port = $config['email_port'];
//create an instance PHpMailer
$email = new PHPMailer(true);
try {
    //server setting
    //debug
    // $email->SMTPDebug = SMTP::DEBUG_SERVER;
    $email->isSMTP();
    $email->Host = $email_smtp;
    $email->SMTPAuth = true;
    $email->Username = $email_username;
    $email->Password = $email_password;
    $email->SMTPSecure = "tls";
    $email->Port = $email_port;

    $email->setFrom($email_username,$name);
    $email->addAddress($toMail);
    //Content
    $email->isHTML(true);
    $email->Subject = $subject;
    $email->Body = $bodyFinal;
    $email->send();
    echo "Selend mail successfully";
} catch (Exception $th) {
    echo "Message could not be sent.Mailer Error: {$email->ErrorInfo}";
}
?>