<?php
header("Content-Type: application/json");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

$data = json_decode(file_get_contents("php://input"), true);
$formType = $data['form_type'];
$email = $data['email'];
$name = $data['name'];
$phone = $data['phone'];
$messageContent = $data['feedback'] ?? $data['complaint'] ?? '';

// Configure email sending
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tech0engineer007@gmail.com';
    $mail->Password = 'mocbckqoabaqzooi';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('tech0engineer007@gmail.com', 'Nagesh');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "$formType Submission";
    $mail->Body = "Thank you, $name! We have received your $formType form:<br><br>Message: $messageContent<br>Phone: $phone";

    if ($mail->send()) {
        echo json_encode(["message" => "$formType form submitted successfully."]);
    } else {
        echo json_encode(["message" => "Error sending email."]);
    }
} catch (Exception $e) {
    echo json_encode(["message" => "Error: {$mail->ErrorInfo}"]);
}
?>
