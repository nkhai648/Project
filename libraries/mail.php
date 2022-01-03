<?php 
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "plugin/PHPMailer/Exception.php";
require "plugin/PHPMailer/PHPMailer.php";
require "plugin/PHPMailer/SMTP.php";

function sendMail($email) {
    require CONFIGPATH . DIRECTORY_SEPARATOR . 'email.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = $getMail['charset'];
    $mail->Encoding = 'base64';   
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP()
        ;                                            
        $mail->Host       = $getMail['host'];                       
        $mail->SMTPAuth   = true;       
        $mail->SMTPSecure = "tls";                            
        $mail->Username   = $getMail['username'];              
        $mail->Password   = $getMail['password'];                       
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = $getMail['smtp_port'];      
                           
        
        //Recipients
        $mail->setFrom($getMail['username'], $getMail['nameFrom']);
        $mail->addAddress($email, 'Khari');                     
        $mail->addReplyTo($getMail['username'], $getMail['replyto']);
        
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');        
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');  
        
        //Content
        $mail->isHTML(true);                                    
        $mail->Subject = $getMail['subject'];
        $mail->Body    = $getMail['body'];
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mail->send();
         echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    $mail->smtpClose();
}

?>