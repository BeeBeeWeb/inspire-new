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

// $emailMessage = <<<EMAILBODY
// <table>
//     <tbody>
//         <tr>
//             <td>Name</td>
//             <td>$fname $lname</td>
//         </tr>
//         <tr>
//             <td>Phone</td>
//             <td>$tel</td>
//         </tr>
//         <tr>
//             <td>Email</td>
//             <td>$mail</td>
//         </tr>
//         <tr>
//             <td>Company</td>
//             <td>$cname</td>
//         </tr>
//         <tr>
//             <td>Role</td>
//             <td>$role</td>
//         </tr>
//     </tbody>
// </table>
// EMAILBODY;

    // $name = $_GET['servicePackages'];

    // if (isset($_GET['servicePackages'])) {
    // $emailMessage .= "<br><h5>Interested in following Service Packages: <br></h5>";

    // foreach ($name as $servicePackages){
    //     echo $servicePackages."<br />";
    // }
    // } else {
    // $emailMessage .= "No Service Packages chosen.";
    // }

    // $emailMessage .= $message;

     $name = $_GET['servicePackages'];

     if (isset($_GET['servicePackages'])) {
     echo "Interested in following Service Packages: <br>";

     foreach ($name as $servicePackages){
          echo $servicePackages."<br />";
     }
     } else {
     echo "You did not choose a color.";
     }

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