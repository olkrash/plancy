<?php

if (isset($_GET["email"])) {
    echo sendMail($_GET["email"]);
}

function sendMail(string $email): string
{
    header('Content-type: application/json');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return json_encode(["success" => false, "message" => "invalid email"]);
    }

    $to = 'admin@plancy.com';
    $subject = 'new client';
    $message = $email . "want`s to contact us, please respond";
    $headers = 'From: admin@plancy.com' . "\r\n" .
        'Reply-To: admin@plancy.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if (!mail($to, $subject, $message, $headers)) {
        return json_encode(["success" => false, "message" => "error sending email"]);
    }

    return json_encode(["success" => true, "message" => "We’ve received your request and will get back to you soon."]);
}