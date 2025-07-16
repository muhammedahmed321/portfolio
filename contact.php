<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'db_config.php';

    if (!isset($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone'], $_POST['subject'], $_POST['message'])) {
        die("Missing form fields");
    }

    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName  = $conn->real_escape_string($_POST['lastName']);
    $email     = $conn->real_escape_string($_POST['email']);
    $phone     = $conn->real_escape_string($_POST['phone']);
    $subject   = $conn->real_escape_string($_POST['subject']);
    $message   = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_messages (first_name, last_name, email, phone, subject, message)
            VALUES ('$firstName', '$lastName', '$email', '$phone', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
    } else {
        die("DB Error: " . $conn->error);
    }

    $conn->close();
} else {
    die("Invalid request method: " . $_SERVER["REQUEST_METHOD"]);
}
?>




