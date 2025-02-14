<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // If using Composer
// require 'path-to-phpmailer/src/PHPMailer.php'; // If using manually

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST["phoneNumber"]);
    $address = htmlspecialchars($_POST["adress"]);
    $postalCode = htmlspecialchars($_POST["postalCode"]);
    $date = htmlspecialchars($_POST["date"]);

    $mail = new PHPMailer(true);

    try {
        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Use Gmail SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'agbasam555@gmail.com'; // Your Gmail
        $mail->Password = 'sfnb lism dbwn kdoq'; // Use an App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Settings
        $mail->setFrom('your-email@gmail.com', 'Your Name');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Valentine's RSVP Confirmation";
        $mail->Body = "
            <html>
            <head><title>Valentine's RSVP Confirmation</title></head>
            <body>
                <h2>It's a Date!!!, $name! ❤️</h2>
                <p>I am excited that you decided to celebrate Valentine's Day/Date Night with me (not like i didn't see it coming)</p>
                <p><strong>Date:</strong> $date</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Address:</strong> $address</p>
                <p><strong>Postal Code:</strong> $postalCode</p>
                <p>Looking forward to an amazing time with you! 😊</p>
                <p>Love pookie❤️</p>
            </body>
            </html>
        ";

        // Send Email
        $mail->send();
        echo "<script>alert('RSVP received! Check your email for confirmation.'); window.location.href='rsvp.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Failed to send email: {$mail->ErrorInfo}'); window.location.href='rsvp.html';</script>";
    }
}
