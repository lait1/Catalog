<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 27.07.2019
 * Time: 12:56
 */

namespace app\views;


class View
{

    function generate($content_view, $data = null, $template_view='template_view.php')
    {
        include 'app/views/'.$template_view;
    }
}