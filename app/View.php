<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 02.11.2017
 * Time: 13:00
 */

namespace beejeetest;


class View
{
    const TEMPLATES = 'templates';
    private $app;

    /**
     * View constructor.
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }


    public function display($name, $params)
    {
        $templateFile = $this->app->root.DIRECTORY_SEPARATOR.self::TEMPLATES.DIRECTORY_SEPARATOR.$name.'.inc';
        extract($params);
        include $templateFile;
    }

    public function prepare($name, $params)
    {
        ob_start();
        $this->display($name, $params);
        $text = ob_get_contents();
        ob_end_clean();

        return $text;
    }

}