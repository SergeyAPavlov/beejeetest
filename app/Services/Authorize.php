<?php


namespace beejeetest\Services;


class Authorize
{
    public static function check($sole)
    {
        if (!empty($_COOKIE)) {

            $login = $_COOKIE['login'];
            $role = $_COOKIE['role'];
            $expires = $_COOKIE['expires'];
            $auth = $_COOKIE['auth'];
            $hash = md5($login . $role . $expires . $sole);
            if ($auth == $hash) {
                return true;
            }

        }
        return false;
    }
}

