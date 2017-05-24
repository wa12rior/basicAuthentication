<?php 

session_start();

require_once '../init.php';

$auth = new AuthService();
$errorHandler = new ErrorsHandler();

if (!$auth->isUserVerified()) {
    session_destroy();
    $errorHandler->setLoginErrors('Your username or password is incorrect.');

    $errors = $errorHandler->getLoginErrors();

    if ($errors) {
        foreach($errors as $error) {
            echo '<div class="wrapper__error">' . $error . '</div>';
        }
        echo '<a href="../../">Return</a>';
    }

    die();
}

if (!$auth->isUserActive()) {
    session_destroy();
    $errorHandler->setLoginErrors('Your account is not activated. Contact our Support!');

    $errors = $errorHandler->getLoginErrors();

    if ($errors) {
        foreach($errors as $error) {
            echo '<div class="wrapper__error">' . $error . '</div>';
        }
        echo '<a href="../../">Return</a>';
    }

    die();
}

$_SESSION['admin'] = $auth->findUser()[0]['admin'];
$_SESSION['username'] = $auth->findUser()[0]['username'];
$_SESSION['logged'] = true;

if ($auth->findUser()[0]['admin']) {
    header('Location: ../views/admin.php');
} else {
    header('Location: ../views/user.php');

}
