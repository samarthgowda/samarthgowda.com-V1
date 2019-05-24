<?php
 
if($_POST) {
    $contactName = "";
    $contactEmail = "";
    $contactSubject = "";
    $contactMessage = "";
    $recipient = "sgowda@andrew.cmu.edu";
     
    if(isset($_POST['contactName'])) {
        $visitor_name = filter_var($_POST['contactName'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['contactEmail'])) {
        $contactEmail = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['contactEmail']);
        $contactEmail = filter_var($contactEmail, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['contactSubject'])) {
        $contactSubject = filter_var($_POST['contactSubject'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['contactMessage'])) {
        $contactMessage = htmlspecialchars($_POST['contactMessage']);
    }
     
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $contactEmail . "\r\n";
     
    if(mail($recipient, $contactSubject, $contactMessage, $headers)) {
        echo "<p>Thank you for reaching out. You will get a reply shortly.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
     
} else {
    echo '<p>Something went wrong</p>';
}
 
?>