<?php
require 'PHPMailerAutoload.php';
$contact_name=$_POST['contact_name'];
$contact_mail=$_POST['contact_mail'];
$contact_message=$_POST['contact_message'];


$mail = new PHPMailer;
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'westvillagepizzapasta@gmail.com';  // SMTP username
$mail->Password = 'texas509';               		// SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom($contact_mail, $contact_name);     //Set who the message is to be sent from
$mail->addReplyTo('westvillagepizzapasta@gmail.com', 'Website West Village');  //Set an alternative reply-to address
$mail->addAddress($contact_mail, $contact_name);  // Add a recipient
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = 'Message from Website';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($contact_message);
 
if(!$mail->send()) {
   //echo 'Message could not be sent.';
   //echo 'Mailer Error: ' . $mail->ErrorInfo;
   //exit;
}
 
//echo 'Message has been sent';

echo "<script type='text/javascript'>alert('Your message has been sent!');
window.location.href='index.php';
</script>";

?>