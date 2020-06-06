<?php


namespace beejeetest\Controllers;


use beejeetest\Models\Tasks;
use beejeetest\Services\Db;

class EditTaskController extends BaseController implements Controller
{
    public function fetch()
    {
        $vars = [];

        $auth = $this->app->getAuthorize();
        $logged = $auth->check(($this->app->getSole()));
        $user = $auth->getUser($this->db);

        if (!($user->role == 1)) {
            header("Location:/auth");
            exit();
        }

        $id = $this->request['get']['id'];
        $model = new Tasks($this->db);
        $task = $model->load($id);

        if (!is_object($task)) {
            header("Location:/add");
            exit();
        }

        if (is_object($task)) {
            $vars['task'] = $task;
        }

        if (!empty($this->request['post'])) {
            $updated = $this->fetchForm($this->request);
            if (is_integer($updated ))  {
                if ($updated == 1) $vars['message'] = 'Задача успешно отредактирована';
                else $vars['message'] = 'Ошибка обновления задачи в базе';
            }
            else $vars['message'] = $updated;
        }

        return $this->view->prepare('edit', $vars);

    }

    public function fetchForm($request)
    {
        $post = $request['post'];

        if (empty($post['username']) OR empty($post['email']) OR empty($post['text'])) {
            return 'Все поля  должны быть непустыми';
        }
        if (strpos($post['email'], '@') === false) {
            return 'Поле емейл невалидно';
        }

        $model = new Tasks($this->db);
        $added = $model->addTask($post);
        return $added;

    }

}