<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nimi = htmlspecialchars($_POST['nimi']);
    $sahkoposti = htmlspecialchars($_POST['sahkoposti']);
    $viesti = htmlspecialchars($_POST['viesti']);

    $to = "aapo.alen@gmail.com"; // Sähköpostiosoite, johon viesti lähetetään
    $subject = "Uusi viesti yhteydenottolomakkeelta";
    $headers = "From: " . $sahkoposti . "\r\n" .
               "Reply-To: " . $sahkoposti . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    $message = "Nimi: $nimi\n" .
               "Sähköposti: $sahkoposti\n" .
               "Viesti:\n$viesti";

    if (mail($to, $subject, $message, $headers)) {
        header("Location: kiitos.html");
        exit();
    } else {
        echo "Viestin lähetys epäonnistui. Yritä uudelleen myöhemmin.";
    }
}
?>

