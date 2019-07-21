<?php
     require '/phpMailer/PHPMailerAutoload.php';
     header('Content-Type: application/json');
     $fname = $_POST['firstName'];
     $lname = $_POST['lastName'];
     $tel = $_POST['phoneNumber'];
     $cname = $_POST['companyName'];
     $mail = $_POST['emailId'];
     $role = $_POST['yourRole'];
     $message = $_POST['enquiryDetails'];

     $mail = new PHPMailer();
     $mail->isSMTP();                                      // Set mailer to use SMTP
     $mail->SMTPDebug = 3;
     $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
     $mail->SMTPAuth = true;                               // Enable SMTP authentication
     $mail->Username = 'inspiregrouppune@gmail.com';                 // SMTP username
     $mail->Password = 'inspire1234';                           // SMTP password
     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
     $mail->Port = 587;                                    // TCP port to connect to

     // $mail->setFrom($_POST['emailId'], $_POST['firstName']);
     $mail->setFrom('inspiregrouppune@gmail.com', 'Contact Us Form - Inspire Website');
     // Add a recipient
     $mail->addAddress('chinmay412@gmail.com');               // Name is optional


     $mail->isHTML(true);                                  // Set email format to HTML

     $mail->Subject = 'Testing PHPmailer email sending functionality.';
     $mail->Body    = "$message Phone $tel";
     $mail->AltBody = $message;
     if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
     } else {
          echo 'Message has been sent';
     }
?>