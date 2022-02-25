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
    

    $mail->setFrom($_POST['email'],$_POST['username']);
    $mail->addAddress('hr@tidyquant.com');
    
    $mail->addReplyTo($_POST['email'],$_POST['username']);
    $mail->AddAttachment( $_FILES["attachment"]["tmp_name"], $_FILES["attachment"]["name"] );
    $mail->isHTML(true);
    $mail->Subject='IT Support';
    
    $mail->Body='<h3>Name :'.$_POST['username'].'<br>Email : '.$_POST['email'].'<br>Mobile Number: '.$_POST['tel'].'</h3>';
    
    
    $mail->send();
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Your Resume submitted successfully. We will contact you soon!!!');
    window.location.href='../itsupport';
    </script>");
}
catch (Exception $e)
{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('An Error Occured, Please Try Again After Some Time.');
    window.location.href='../itsupport';
    </script>");
}
?>