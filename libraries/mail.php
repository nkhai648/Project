<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/OAuth.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/POP3.php';
    require 'PHPMailer/src/SMTP.php';

    function mailer($addressee, $mailSubject, $mailContent) {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug  = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'nkhai648@gmail.com';
            $mail->Password   = 'wkezojhudjwncitd';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
    
            $mail->setFrom('nkhai648@gmail.com', 'Mailer');
            $mail->addAddress($addressee, 'Addressee');
    
            //Content
            $mail->isHTML(true);
            $mail->Subject = $mailSubject;
            $mail->Body    = $mailContent;
    
            $mail->send();
            // echo 'Tin nhắn đã được gửi đi';
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    

