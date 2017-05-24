<?php

require_once '../init.php';

$registrationService = new RegistrationService();
$errorsHandler = new ErrorsHandler();
$mail = new Mail();

if (!$registrationService->arePasswordsMatched()) {
    $errorsHandler->setRegistrationErrors('Passwords do not match.');
}

if (!$registrationService->isEmailCorrect()) {
    $errorsHandler->setRegistrationErrors('Incorrect email address.');
}

if ($registrationService->isRegistered()) {
    $errorsHandler->setRegistrationErrors('You are registered.');
}

if (!$errorsHandler->getRegistrationErrors()) {
    $registrationService->registerUser();
    $mail->sendActivationLink($registrationService->getUserEmail(), $registrationService->getUserLink());
    header('Location: ../views/registered.php');
} else {
    // to sie dzieje jesli są błędy xd temporary solution
    foreach($errorsHandler->getRegistrationErrors() as $error) {
        echo '<div class="wrapper__error">' . $error . '</div>';
    }
    echo '<a href="../../index.php">Return</a>';
}


