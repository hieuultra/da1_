<?php
function  sendConfirmationEmail($name_user, $email_user, $phone_user, $subject_name, $content)
{
    // Sử dụng PHPMailer
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        
        $mail->IsSMTP(); // enable SMTP
        $mail->CharSet = "UTF-8";
        $mail->IsHTML(true);
        $mail->SMTPDebug = 0; // gỡ lỗi: 0 = không hiển thị, 1 = hiển thị lỗi và tin nhắn, 2 = chỉ hiển thị tin nhắn
        $mail->SMTPAuth = true; // xác thực SMTP
        $mail->SMTPSecure = 'tls'; // kết nối an toàn SMTP: tls hoặc ssl
        $mail->Host = "sandbox.smtp.mailtrap.io"; // địa chỉ máy chủ SMTP của bạn
        $mail->Port = 587; // cổng SMTP của bạn
        $mail->Username = "44182cdd746b07"; // tài khoản SMTP của bạn
        $mail->Password = "956449fad70de4"; // mật khẩu SMTP của bạn
        $mail->SetFrom($email_user); // địa chỉ email người gửi
        $mail->Subject = "$subject_name"; // chủ đề email 
        $mail->Body = 'Tên Khách Hàng: ' . $name_user . ' <br>Email: ' . $email_user . ' <br> Phone: ' . $phone_user . ' <br> Feedback: ' . $content; // nội dung email
        $mail->AddAddress('hieubtph32408@fpt.edu.vn'); // địa chỉ email người nhận

        if (!$mail->Send()) {
            return false; // Gửi email thất bại
        } else {
            return true; // Gửi email thành công
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>