<?php
$to = 'safwan.layek@gmail.com';
$subject = 'Test Email';
$message = 'This is a test email.';
$headers = 'From: sociala@safwan.itrrc.com';

if (mail($to, $subject, $message, $headers)) {
    echo 'Mail sent successfully.';
} else {
    echo 'Mail sending failed.';
}
?>
