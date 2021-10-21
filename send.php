<?php
    //Khai bao de su dung php mailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;   
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
 
    function sendEmail($recipient,$code){
        // tao ra 1 doi tuong phpmailer
        $mail = new PHPMailer(true);

        try{
            //Cai dat 1 so tham so lien quan den may chu email
            //Server settings
            $mail->SMTPDebug = 0;// Enable verbose debug output
            $mail->isSMTP();// gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->Username = 'loi65732102@gmail.com';// tk cua minh
            $mail->Password = 'qeoxzmatqlumqusg'; //  mk cua minh
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            //cai dat thong tin nguoi gui va nhan
            $mail->setFrom('loi65732102@gmail.com', '31.Nguyen Duc Loi.1951060819');

            $mail->addReplyTo('loi65732102@gmail.com', '31.Nguyen Duc Loi.1951060819');

            $mail->addAddress($recipient); // dia chi nguoi nhan(nguoi muon gui email toi,sau nay cho nay la bien)
            //neu tich hop vao chuc nang dang ki , dat email cua nguoi dang ki vao day
        
            // Content
            $mail->isHTML(true);    // Set email format to HTML:chueyn dinh dang email thanh html
            $mail->Subject = '[localhost] Kích hoạt tài khoản';//Tieu de
            //Noi dung
            $mail->Body = 'Nhấp vào đây để kích hoạt: <a href="http://localhost/authemail/activation.php?email='.$recipient.'&code='.$code.'">Nhấp vào đây</a>';
          
            //sau khi cai dat xong ra lenh gui email
            if($mail->send()){
                echo 'Thư đã gửi đi thành công!';
            }

        }catch(Exception $e){
            echo "Lỗi ".$e->getMessage();
        }

    }

?>