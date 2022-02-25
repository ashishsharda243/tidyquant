<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try{
    $mail->IsSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=465;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='ssl';
    $mail->Username='tidyquantltd@gmail.com';
    $mail->Password='4e24e6f6';

    $mail->setFrom($_POST['email'],$_POST['fullname']);
    $mail->addAddress('team@tidyquant.com');
    $mail->addReplyTo($_POST['email'],$_POST['fullname']);

    $mail->isHTML(true);
    $mail->Subject='Contact: '.$_POST['subject'];
    $mail->Body='<h3>Name :'.$_POST['fullname'].'<br>Email : '.$_POST['email'].'<br>Mobile Number: '.$_POST['mobile'].'<br>Message: '.$_POST['message'].'</h3>';

    $mail->send();
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Your message sent successfully. We will contact you soon!!!');
    window.location.href='../contact';
    </script>");
}
catch (Exception $e)
{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('An Error Occured, Please Try Again After Some Time.');
    window.location.href='../contact';
    </script>");
}
?>