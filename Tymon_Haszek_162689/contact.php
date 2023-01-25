<?php

function PokazKontakt() {
    $form = '
    <div class="contact-form">
        <h1 class="heading">Skontaktuj się ze mną:</h1>
        <form method="post" action="contact.php">
            <label>Name:</label>
            <input type="text" name="name" placeholder="Twoje Imię" required>
            <label>Email:</label>
            <input type="email" name="email" placeholder="Twój email" required>
            <label>Message:</label>
            <textarea name="message" placeholder="Treść wiadomości..." required></textarea>
            <input type="submit" name="send_message" value="Wyślij">
        </form>
    </div>
    ';
    return $form;
}

function WyslijMailKontakt() {
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $to = "162689@student.uwm.edu.com";
        $subject = "Contact Form";
        $headers = "From: ".$name." <".$email.">\r\n";
        $send_mail = mail($to,$subject,$message,$headers);
        if($send_mail) {
            header('Location: ./html/kontakt_index.php');
            echo "Dziękuję za wysłanie emaila";
        }
        else {
            header('Location: ./html/kontakt_index.php');
            echo "BŁĄD PRZY WYSYŁANIU MAILA";
        }
        echo "<script>window.location.href='../admin/admin.php'</script>";
    }
}
// <!-- funkcja pozwalająca na pobranie istniejącego hasła z bazy jak utworzę tabelę dla użytowników -->
// <!-- function PrzypomnijHaslo() { 
//     if(isset($_POST['email'])) {
//         $email = $_POST['email'];

//         $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
//         $result = mysqli_query($link, $query);
//         $user = mysqli_fetch_array($result);

//         if(empty($user)) {
//             return "Nie ma użytkownika z takim adresem e-mail.";
//         } else {
//             $new_password = generateRandomPassword();

//             $query = "UPDATE users SET password='$new_password' WHERE email='$email'";
//             $result = mysqli_query($link, $query);

//             WyslijMail($email, "Nowe hasło", "Twoje nowe hasło: $new_password");

//             return "Nowe hasło zostało wysłane na twój adres e-mail.";
//         }
//     } else {
//         return '
//         <form method="POST" action="'.$_SERVER['REQUEST_URI'].'">
//             <label for="email">Wprowadź swój adres e-mail:</label>
//             <input type="email" name="email" required>
//             <input type="submit" value="Przypomnij hasło">
//         </form>
//         ';
//     }
// } -->

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    WyslijMailKontakt($name, $email, $message);
}

?>



