<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Set the recipient email address
    $to = "aravindhmca2@gmail.com"; // Change this to your email address
    
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    // Set the email subject
    $subject = "New Reservation Request";
    
    // Construct the email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Message:\n$message\n";
    
    // Set additional headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Attempt to send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Your reservation request has been sent successfully!";
    } else {
        echo "Sorry, there was an error sending your reservation request. Please try again later.";
    }
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: your-form-page.html");
    exit;
}

?>
