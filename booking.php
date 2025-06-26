<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service = $_POST["service"];
    $addons = $_POST["addons"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $payment = $_POST["payment"];
    $notes = $_POST["notes"];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'prestigemaids9@gmail.com';        // ✅ Your Gmail
        $mail->Password   = 'ztqq wxco rbjz fdcn';              // ✅ App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('prestigemaids9@gmail.com', 'Cleaning Booking');
        $mail->addAddress('prestigemaids9@gmail.com');         // ✅ Recipient

        $mail->isHTML(true);
        $mail->Subject = 'New Booking Request';
        $mail->Body    = "
            <h2>New Booking Details</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Address:</strong> $address</p>
            <p><strong>Service:</strong> $service</p>
            <p><strong>Add-ons:</strong> $addons</p>
            <p><strong>Date:</strong> $date</p>
            <p><strong>Time:</strong> $time</p>
            <p><strong>Payment:</strong> $payment</p>
            <p><strong>Notes:</strong> $notes</p>
        ";

        $mail->send();
        echo "<script>
            alert('🎉 Booking successful! We’ll get back to you shortly.');
            window.location.href = 'index.html';
        </script>";
    } catch (Exception $e) {
        echo "<script>
            alert('❌ Error: {$mail->ErrorInfo}');
            history.back();
        </script>";
    }
}
?>
