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
        if(empty($id)) $id = $this->request['post']['id'];
        $model = new Tasks($this->db);
        $task = $model->load($id);

        if (!is_object($task)) {
            header("Location:/add");
            exit();
        }

        if (!empty($this->request['post'])) {
            $updated = $this->fetchForm($this->request, $task);
            header("Location:/edit?id=".$id);
            exit();
        }

        if (is_object($task)) {
            $vars['task'] = $task;
        }
        return $this->view->prepare('edit', $vars);

    }

    public function fetchForm($request, $task)
    {
        $post = $request['post'];

        if (empty($post['username']) OR empty($post['email']) OR empty($post['text'])) {
            return 'Все поля  должны быть непустыми';
        }
        if (strpos($post['email'], '@') === false) {
            return 'Поле емейл невалидно';
        }

        $model = new Tasks($this->db);
        if ($task->text != $post['text']) $task->edited = 1;
        $task->username = $post['username'];
        $task->email = $post['email'];
        $task->status_id = (integer)$post['status_id'];
        $task->text = $post['text'];

        $updated = $model->updateTask($task);
        return $updated;

    }

}