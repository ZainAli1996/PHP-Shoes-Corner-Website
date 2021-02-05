<?php

$to_email = "smart_zain@ymail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script From ZAIN ALI";
$headers = "From: zainirshadali@gmail.com";

if(mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
?>