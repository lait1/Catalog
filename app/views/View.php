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

    function generate($content_view, $template_view='template_view.php', $data = null)
    {
        include 'app/views/'.$template_view;
    }
}