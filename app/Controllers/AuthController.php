<?php


namespace beejeetest\Controllers;

use beejeetest\Services\Authorize;
use beejeetest\Services\Db;

class AuthController extends BaseController implements Controller
{
    public function fetch()
    {
        if (!empty($this->request['post'])) {
            $authorized = $this->fetchForm($this->request);
            if (is_object($authorized)) {
                $vars['logged'] = true;
                $vars['login'] = $authorized->name;
                return $this->view->prepare('logged', $vars);
            }
            $vars['message'] = $authorized;
        }
        $vars['logged'] = $this->app->getAuthorize()->check(($this->app->getSole()));
        $vars['login'] = $this->app->getAuthorize()->getLogin();

        if ($vars['logged']) {
            return $this->view->prepare('logged', $vars);
        } else {
            return $this->view->prepare('auth', $vars);
        }
    }

    public function fetchForm($request)
    {
        $post = $request['post'];
        if (empty($post['login']) OR empty($post['password'])) {
            return 'Логин и пароль не должны быть пустыми';
        }
        $authorize = $this->app->getAuthorize();
        $user = $authorize->getLogged($this->db, $post['login'], $post['password']);
        if (empty($user)) {
            return 'Логин или пароль введены неправильно';
        } else {
            $authorize->setAuth($this->app->getSole(), $post['login'], $authorize::ROLE_ADMIN);
            return $user;
        }
    }

}