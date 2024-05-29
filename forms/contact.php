<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receiving_email_address = 'czaki.famul@gmail.com';

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if ($name && $email && $subject && $message) {
        $mailto_link = "mailto:$receiving_email_address";
        $mailto_link .= "?subject=" . urlencode($subject);
        $mailto_link .= "&body=" . urlencode("Imię: $name\nEmail: $email\n\nWiadomość:\n$message");
        $mailto_link .= "&from=" . urlencode($email);

        echo "<script type='text/javascript'>window.location.href='$mailto_link';</script>";
    } else {
        echo "Wszystkie pola są wymagane i muszą być poprawne.";
    }
} else {
    echo "Nieprawidłowa metoda żądania.";
}
?>
