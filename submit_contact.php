<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the form inputs (name, email, message)
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $recipient = $_POST["recipient"]; // Retrieve recipient email from hidden input

    // Construct the email headers
    $to = $recipient; // Recipient's email address
    $subject = "New Contact Form Submission";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $name <$email>\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    // Construct the email message
    $body = "<html><body>";
    $body .= "<h1>New Contact Form Submission</h1>";
    $body .= "<p>Name: $name</p>";
    $body .= "<p>Email: $email</p>";
    $body .= "<p>Message: $message</p>";
    $body .= "</body></html>";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Error sending email.";
    }
}
?>
