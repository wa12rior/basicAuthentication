<?php require_once '../pokaz_kod.php'; ?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Log | Sign</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="app/css/standardize.css">
        <link rel="stylesheet" href="app/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300|Raleway:400,500" rel="stylesheet">
    </head>
    <body>
    <div class="content">
        <div class="wrapper">
            <p class="wrapper__title">Frizcode</p>
            <div class="wrapper__buttons">
                <button class="wrapper__signIn btn btn--active">Sign in</button>
                <button class="wrapper__signUp btn">Sign up</button>
            </div>
            <form action="app/controllers/login.php" class="wrapper__form wrapper__form--active" method="post" autocomplete="off">
                <label>Username</label>
                <input type="text" name="loginUsername" placeholder="Your username" required>
                <label>Password</label>
                <input type="password" name="loginPassword" placeholder="********" required>
                <a class="wrapper__resetLink" href="reset/reset.php">Reset your password.</a>
                <button type="submit" class="submitButton">Sign in</button>
            </form>
            <form action="app/controllers/register.php" class="wrapper__form" method="post" autocomplete="off">
                <label>Username</label>
                <input type="text" name="username" placeholder="Your username" required>
                <label>Password</label>
                <input type="password" name="password" placeholder="Your password" required>
                <label>Confirm password</label>
                <input type="password" name="confirmedPassword" placeholder="Confirm password" required>
                <label>Email</label>
                <input type="text" name="email" placeholder="example@email.com" required>
                <button type="submit" class="submitButton">Sign up</button>
            </form>
        </div>
    </div>
    <script src="app/js/menu.js"></script>
    </body>
</html>
