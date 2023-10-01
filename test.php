<?php
require_once 'mail.php';
$mail -> setFrom('touriaa.abbou@gmail.com','je suis');
$mail -> addAddress('touriaa.abbou@gmail.com');
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->send();
