
<?php
include 'db_config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "ahmedkashi857@gmail.com"; 
    $subject = "New Contact Form Message";

    $firstName = $_POST['first_name'];
    $lastName  = $_POST['last_name'];
    $email     = $_POST['email'];
    $phone     = $_POST['phone'];
    $subjectFromUser = $_POST['subject'];
    $message   = $_POST['message'];

    $body = "Name: $firstName $lastName\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Subject: $subjectFromUser\n";
    $body .= "Message:\n$message";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Error: Message could not be sent.";
    }
} else {
    echo "Not allowed!";
}
?>





