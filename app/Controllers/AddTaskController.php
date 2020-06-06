<?php


namespace beejeetest\Controllers;


use beejeetest\Models\Tasks;

class AddTaskController extends BaseController implements Controller
{
    public function fetch()
    {
        $vars = [];
        if (!empty($this->request['post'])) {
            $added = $this->fetchForm($this->request);
            if (is_integer($added))  {
                if ($added == 1) $vars['message'] = 'Задача успешно добавлена';
                else $vars['message'] = 'Ошибка добавления задачи в базу';
            }
            else $vars['message'] = $added;
        }

        return $this->view->prepare('add', $vars);

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