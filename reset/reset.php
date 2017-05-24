<?php

require_once '../app/init.php';

require_once '../app/views/resetForm.php';

function checkErrors() {
    $db = new DB();
    $helper = new Helper();
    $mail = new Mail();
    $userService = new UserService();

    $password = md5(rand(1,15));
    $email = $helper->escapePostInput('email');
    $message = 'Twoje nowe hasło to: ' . $password;

    $query = "SELECT * FROM users WHERE email = ?";

    $stmt = $db->query($query, [$email]);

    $user = $stmt[0]['username'];

    if (!$stmt) {
        echo 'Podałeś zły adres email.';
        return;
    }

    $userService->changePassword($user, $password);
    $mail->sendResetPassword($email, $message);

    return 'Hasło zresetowane pomyślnie. ';
}

if ($_POST) {
    echo checkErrors();
}

echo '<br>' . "<a href=\"https://platform.reculazy.com:4430/kamilserafin/cms/\">Powrót</a>";

