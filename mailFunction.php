<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function sendmail($email, $subject , $message){

    $mail = new PHPMailer();
    // echo $mail,$message;
    try {
        // $mail->SMTPDebug  = SMTP::DEBUG_SERVER; 
        
        // $mail->isSMTP();
        // $mail->Host       = 'smtp.gmail.com';
        // $mail->SMTPAuth   = true;            
        // $mail->Username   = 'aboodsuliman1999@gmail.com';
        // $mail->Password   = 'wsftqjudjkyzrlvv';                    
        // $mail->SMTPSecure = 'ssl';   
        // $mail->Port       = 465;                           

        $mail->isSMTP(); 
        // 'smtp.hostinger.com'
        $mail->Host = 'smtp.titan.email';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@zaker.click'; 
        $mail->Password   = 'zaker3@12345';                    
        $mail->SMTPSecure = 'ssl';   
        $mail->Port = 465; 

        $mail->setFrom('info@zaker.click', 'zaker');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";

        $mail->Subject = $subject;
        $mail->Body    = $message;
        if ($mail->send()){
            return true;
        }else
            return false;
        // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}



?>