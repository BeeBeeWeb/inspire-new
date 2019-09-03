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

$emailMessage = <<<EMAILBODY
<table style="border-color: #666666; border-spacing: 0px; padding: 4px;" border="1">
    <tbody>
        <tr>
            <td style="background-color: #cccccc; padding: 5px 10px;">Name</td>
            <td style="padding: 5px 10px;">$fname $lname</td>
        </tr>
        <tr>
            <td style="background-color: #cccccc; padding: 5px 10px;">Phone</td>
            <td style="padding: 5px 10px;">$tel</td>
        </tr>
        <tr>
            <td style="background-color: #cccccc; padding: 5px 10px;">Email</td>
            <td style="padding: 5px 10px;">$mail</td>
        </tr>
        <tr>
            <td style="background-color: #cccccc; padding: 5px 10px;">Company</td>
            <td style="padding: 5px 10px;">$cname</td>
        </tr>
        <tr>
            <td style="background-color: #cccccc; padding: 5px 10px;">Role</td>
            <td style="padding: 5px 10px;">$role</td>
        </tr>
    </tbody>
</table>
EMAILBODY;

     if(!empty($_POST['servicePackages'])) {
          $emailMessage .= "<br>Interested in Service Packages: <br>";
          foreach($_POST['servicePackages'] as $value) {
               $emailMessage .= "<strong>" . $value . "</strong><br>";
          }
     }

     if(!empty($_POST['get-in-touch'])) {
          foreach($_POST['get-in-touch'] as $value) {
               $emailMessage .= "<br><i>" . $value . "</i><br>";
          }
     }

     $emailMessage .= '<br><br><u>Feedback:</u><br>';
     $emailMessage .= $message;

     $mail = new PHPMailer();
     $mail->isSMTP();                                      // Set mailer to use SMTP
     $mail->SMTPDebug = 0;
     $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
     $mail->SMTPAuth = true;                               // Enable SMTP authentication
     $mail->Username = 'inspiregrouppune@gmail.com';                 // SMTP username
     $mail->Password = 'inspire1234';                           // SMTP password
     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
     $mail->Port = 587;                                    // TCP port to connect to

     // $mail->setFrom($_POST['emailId'], $_POST['firstName']);
     $mail->setFrom('inspiregrouppune@gmail.com', 'Inspire Website - Contact Us');
     // Add a recipient
     $mail->addAddress('info@inspiregroup.in');               // Name is optional


     $mail->isHTML(true);                                  // Set email format to HTML

     $mail->Subject = 'Inspire Website - Contact Us';
     $mail->Body    = "$emailMessage";
     $mail->AltBody = $emailMessage;
     if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
     } else {
          echo 'Message has been sent';
     }
?>