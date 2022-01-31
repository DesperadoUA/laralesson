<?php
namespace App;
class Sender
{
    public static function mailCandidate($mail, $token)
    {
        $email = config('constants.MAIL');
        $front_domain = config('constants.FRONT_DOMAIN');
        $theme = "Подтверждение регистрации на сайте {$front_domain}";
        $recipient = $mail;
        $url_candidate = $front_domain.'/candidate/'.$token;
        $message = "Для подтверждения регистрации на сайте {$front_domain} перейдите по <a href='{$url_candidate}'>ссылке</a>";

        $headers = "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\nContent-type: text/html; charset=utf-8";
        mail($recipient, $theme, $message, $headers);
    }
}