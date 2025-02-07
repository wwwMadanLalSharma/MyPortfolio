<?php
// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitize and store the form data
    $name    = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email   = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Validate required fields (you can add more robust validation as needed)
    if (empty($name) || empty($email) || empty($message)) {
        http_response_code(400);
        echo "Please complete all required fields.";
        exit;
    }

    // Set the recipient email address
    $to = 'madan.lal.sharma@icloud.com';

    // Create the email subject
    $subject = "New Contact Form Submission from " . $name;

    // Build the email content
    $email_content  = "You have received a new message from your website contact form.\n\n";
    $email_content .= "Name: " . $name . "\n";
    $email_content .= "Email: " . $email . "\n";
    $email_content .= "Message:\n" . $message . "\n";

    // Set the email headers
    $headers  = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Try to send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Set a 200 (okay) response code and echo a success message.
        http_response_code(200);
        echo "Message sent successfully";
    } else {
        // Set a 500 (internal server error) response code and echo an error message.
        http_response_code(500);
        echo "There was a problem sending your message.";
    }
} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>
