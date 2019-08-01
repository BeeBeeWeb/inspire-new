<?php
     require '/phpMailer/PHPMailerAutoload.php';
     header('Content-Type: application/json');
     $postApplied = $_POST['postApplied'];
     $candidateName = $_POST['candidateName'];
     $edicationalQualification = $_POST['edicationalQualification'];
     $expertiseArea = $_POST['expertiseArea'];
     $totalExperience = $_POST['totalExperience'];
     $candidateAddress = $_POST['candidateAddress'];
     $candidatePhone = $_POST['candidatePhone'];
     $candidateEmail = $_POST['candidateEmail'];

$emailMessage = <<<EMAILBODY
<table style="border-color: #666666; border-spacing: 0px; padding: 4px;" border="1">
    <tbody>
        <tr>
            <td style="background-color: #cccccc; padding: 5px 10px;">Post applying for</td>
            <td style="padding: 5px 10px;">$postApplied $lname</td>
        </tr>
        <tr>
            <td style="background-color: #cccccc; padding: 5px 10px;">Name of the candidate</td>
            <td style="padding: 5px 10px;">$candidateName</td>
        </tr>
        <tr>
            <td style="background-color: #cccccc; padding: 5px 10px;">Educational Qualification</td>
            <td style="padding: 5px 10px;">$edicationalQualification</td>
        </tr>
        <tr>
            <td style="background-color: #cccccc; padding: 5px 10px;">Area of Expertise</td>
            <td style="padding: 5px 10px;">$expertiseArea</td>
        </tr>
        <tr>
            <td style="background-color: #cccccc; padding: 5px 10px;">Total Experience</td>
            <td style="padding: 5px 10px;">$totalExperience</td>
        </tr>
        <tr>
            <td style="background-color: #cccccc; padding: 5px 10px;">Address</td>
            <td style="padding: 5px 10px;">$candidateAddress</td>
        </tr>
        <tr>
            <td style="background-color: #cccccc; padding: 5px 10px;">Phone Number</td>
            <td style="padding: 5px 10px;">$candidatePhone</td>
        </tr>
        <tr>
            <td style="background-color: #cccccc; padding: 5px 10px;">Email</td>
            <td style="padding: 5px 10px;">$candidateEmail</td>
        </tr>
    </tbody>
</table>
EMAILBODY;

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
     $mail->setFrom('inspiregrouppune@gmail.com', 'Inspire Website - Careers');
     // Add a recipient
     $mail->addAddress('chaitanya@inspiregroup.in');               // Name is optional


     $mail->isHTML(true);                                  // Set email format to HTML

     $mail->Subject = 'Inspire Website - Careers';
     $mail->Body    = "$emailMessage";
     $mail->AltBody = $emailMessage;
     if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
     } else {
          echo 'Message has been sent';
     }
?>