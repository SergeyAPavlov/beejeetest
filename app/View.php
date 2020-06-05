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
    public static function display($app, $name, $params)
    {
        $templateFile = $app->root.DIRECTORY_SEPARATOR.self::TEMPLATES.DIRECTORY_SEPARATOR.$name.'.inc';
        extract($params);
        include $templateFile;
    }

    public static function prepare($app, $name, $params)
    {
        ob_start();
        self::display($app, $name, $params);
        $text = ob_get_contents();
        ob_end_clean();

        return $text;
    }

}