<?php


namespace beejeetest\Controllers;

use beejeetest\Models\Tasks;
use beejeetest\Services\Paginate;

class TasksController extends BaseController implements Controller
{
    public function fetch()
    {

        $limit = 3;
        $model = new Tasks($this->db);
        $order = 't1.id';
        if ($this->request['get']['order'] == 'username') {
            $order = 'username';
        } elseif ($this->request['get']['order'] == 'email') {
            $order = 'email';
        } elseif ($this->request['get']['order'] == 'status') {
            $order = 'status';
        }

        if ($this->request['get']['sort'] == 'desc') {
            $order = $order . ' DESC ';
        }

        $pg = new Paginate($limit, $model->countTasks());
        $prefix = "/?order=".$this->request['get']['order'];
        if (!empty($this->request['get']['sort'])) $prefix =  $prefix."&sort=".$this->request['get']['sort'];
        $prefix =  $prefix.'&';
        $vars['pages'] = ($pg->getPagesQuantity() > 1 ? $pg->getPagesHtml($prefix) : '');

        $page = $this->request['get']['page'];
        if (empty($page)) $page = 1;
        $offset = ($page-1) * $limit;
        $limitSql = "LIMIT $limit OFFSET $offset";

        $vars['tasks'] = $model->getTasks($order, $limitSql);
        $vars['logged'] = $this->app->getAuthorize()->check(($this->app->getSole()));
        $vars['login'] = $this->app->getAuthorize()->getLogin();

        if ($vars['logged']) {
            return $this->view->prepare('tasks_admin', $vars);
        } else {
            return $this->view->prepare('tasks', $vars);
        }
    }


}