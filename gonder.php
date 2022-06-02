<title>Posta Gönderme Sonuç Raporu</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
require("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP(true);
$mail->From     = "your email address";//"admin@localhost"; // sender mail address
$mail->Sender   = "your email address";//"admin@localhost";// sender mail address

$mail->AddReplyTo=($_POST["email"]);//"admin@localhost";// Reply to address
$mail->FromName = $_POST["name"];//"PHP Mailer";// who is sending
$mail->Host     = "mail.alanadiniz.site";//"localhost"; //SMTP server address host
$mail->SMTPAuth = true;
$mail->SMTPSecure = false;
$mail->SMTPAutoTLS = false;
$mail->Port     = 587; // SMPT Mail Port
$mail->CharSet = 'UTF-8'; // to support turkish charset
$mail->Username = "your email address";// "admin@localhost"; //SMTP username - email address
$mail->Password = "your password";//""; //SMTP mail password
$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->Subject  = " An email from from website";//You can edit this subject as you wish
$body  = "						"."Have a message from website : "."<br><br>";
$body .= "Sender     		: ".$_POST["name"]."<br>";
$body .= "E-mail Adresi  	: ".$_POST["email"]."<br>";
$body .= "Phone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$_POST["phone"]."<br>";
$body .= "Message &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$_POST["message"]."<br>";

$textBody = $body;//
$mail->Body = $body;
$mail->AltBody = $text_body;
/* if you wish you can add CC  */
// $mail->addCC('mailadi@alanadiniz.site');// cc email adresi
// $mail->addBCC('mailadi@alanadiniz.site');// bcc email adresi
// $mail->AddAddress("mailadi@alanadiniz.site"); // Mail gönderilecek adresleri ekliyoruz.
if($mail->Send()){
$mail->ClearAddresses();
$mail->ClearAttachments();
header("Location:/?state=success");
}else{
$mail->ClearAddresses();
$mail->ClearAttachments();
header("Location:/?state=failed");
}