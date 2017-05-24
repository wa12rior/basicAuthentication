<?php

require_once 'pokaz_kod.php';

class Mail {

    public function sendActivationLink($recipient, $link) {
        $header = 'Activation on FrizCode';

        mail($recipient, $header, $link);
    }

    public function sendResetPassword($recipient, $link) {
        $header = 'Reset password';

        mail($recipient, $header, $link);
    }
}