<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formType = $_POST['form_type'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format';
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tech0engineer007@gmail.com';
        $mail->Password   = 'mocbckqoabaqzooi';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        $mail->setFrom('tech0engineer007@gmail.com', 'Nagesh');
        $mail->addAddress($email);

        $mail->isHTML(true);

        // Check if the form type is complaint or feedback
        if ($formType === 'complaint') {
            $complaint = $_POST['complaint'];

            // Handle media attachment if uploaded
            if (!empty($_FILES['media']['tmp_name'])) {
                $mail->addAttachment($_FILES['media']['tmp_name'], $_FILES['media']['name']);
            }

            // Complaint email content
            $mail->Subject = 'Complaint Submission';
            $mail->Body = 'Dear ' . htmlspecialchars($name) . ',<br><br>'
                . 'Thank you for submitting your complaint. Here are the details you provided:<br><br>'
                . '<strong>Name:</strong> ' . htmlspecialchars($name) . '<br>'
                . '<strong>Email:</strong> ' . htmlspecialchars($email) . '<br>'
                . '<strong>Phone:</strong> ' . htmlspecialchars($phone) . '<br>'
                . '<strong>Complaint:</strong> ' . nl2br(htmlspecialchars($complaint)) . '<br><br>'
                . 'We will address your concern as soon as possible.<br><br>'
                . 'Best regards,<br>Sampark';

        } else {
            // Handle feedback form submission as previously set up
            $stayExperience = $_POST['stay_experience'];
            $roomType = $_POST['room_type'];
            $servicesUsed = isset($_POST['services']) ? implode(", ", $_POST['services']) : 'None';
            $feedback = $_POST['message'];

            $mail->Subject = 'Thank You for Your Feedback';
            $mail->Body = 'Dear ' . htmlspecialchars($name) . ',<br><br>' 
                . 'Thank you for your feedback! Here are the details you provided:<br><br>'
                . '<strong>Name:</strong> ' . htmlspecialchars($name) . '<br>'
                . '<strong>Email:</strong> ' . htmlspecialchars($email) . '<br>'
                . '<strong>Phone:</strong> ' . htmlspecialchars($phone) . '<br>'
                . '<strong>Stay Experience:</strong> ' . htmlspecialchars($stayExperience) . '<br>'
                . '<strong>Room Type:</strong> ' . htmlspecialchars($roomType) . '<br>'
                . '<strong>Services Used:</strong> ' . htmlspecialchars($servicesUsed) . '<br>'
                . '<strong>Feedback:</strong> ' . nl2br(htmlspecialchars($feedback)) . '<br><br>'
                . 'We appreciate you taking the time to share your thoughts, and we look forward to serving you again.<br><br>'
                . '<img src="https://static.vecteezy.com/system/resources/previews/000/182/452/original/thank-you-lettering-typography-vector.jpg" '
                . 'alt="Thank You Image" width="300" height="200"><br><br>'
                . 'Best regards,<br>Sampark';
        }

        if ($mail->send()) {
            echo "<script type='text/javascript'>
                alert('Form has been submitted');
                window.location.href = '/contact-form/home.php';
            </script>";
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Error in sending mail');</script>";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>
