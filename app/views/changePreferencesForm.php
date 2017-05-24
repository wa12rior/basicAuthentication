<?php require_once '../init.php'; ?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Zamiana Danych</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <p>Zmiana Danych</p>
        <form action="" method="POST" autocomplete="off">
            <input type="text" name="name" placeholder="Nowa nazwa">
            <input type="hidden" name="hid" value="NICKNAME">
            <button type="submit">Submit</button>
        </form>
        <form action="" method="POST" autocomplete="off">
            <input type="password" name="password" placeholder="Hasło">
            <input type="hidden" name="hid" value="PASSWORD">
            <button type="submit">Submit</button>
        </form>
    </body>
</html>