<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receiving_email_address = 'czaki.famul@gmail.com';

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if ($name && $email && $subject && $message) {
        $to = $receiving_email_address;
        $headers = "From: $name <$email>\r\n";
        $body = "Imię: $name\nEmail: $email\n\nWiadomość:\n$message";

        if (mail($to, $subject, $body, $headers)) {
            echo "Wiadomość została wysłana pomyślnie.";
        } else {
            echo "Wystąpił błąd podczas wysyłania wiadomości.";
        }
    } else {
        echo "Wszystkie pola są wymagane i muszą być poprawne.";
    }
} else {
    echo "Nieprawidłowa metoda żądania.";
}
?>
