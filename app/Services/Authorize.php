<?php


namespace beejeetest\Services;


use beejeetest\Models\User;

/**
 * Class Authorize
 * @package beejeetest\Services
 */
class Authorize
{

    const ROLE_ADMIN = 1;
    /**
     * @param $sole
     * @return bool
     */
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

    public static function getLogin()
    {
        if (!empty($_COOKIE['login'])) return $_COOKIE['login'];
        return '';
    }

    /**
     * @param Db $db
     * @param string $login
     * @param string $password
     * @return User|null
     */
    public static function getLogged(Db $db, $login, $password)
    {
        $user = new User($db);
        $user->find('name', $login);
        if ($user->password == $password) {
            return $user;
        }
        return null;
    }

    public static function getUser(Db $db)
    {
        $user = new User($db);
        $user->find('name', self::getLogin());
        if (!empty($user->id)) return $user;
        return null;
    }

    /**
     * @param User $user
     * @return bool
     */
    public static function checkAdmin(User $user)
    {
        return $user->role == self::ROLE_ADMIN;
    }

    public static function setAuth($sole, $login, $role)
    {
        $time = time();
        $expires = $time+60*60*24*30;
        setcookie("login", $login,  $expires);
        setcookie("role", $role,  $expires);
        setcookie("expires", $expires,  $expires);
        $auth = md5($login.$role.$expires.$sole);
        setcookie("auth", $auth, $expires);

    }

    public static function removeAuth()
    {
        $time = time();
        $expires = $time-3600;
        setcookie("login", '',  $expires);
        setcookie("role", '',  $expires);
        setcookie("expires", '',  $expires);
        setcookie("auth", '', $expires);

    }
}

