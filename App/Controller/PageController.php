<?php namespace App\Controller;

use Ascend\Core\View;

class PageController
{
    public static function viewIndex()
    {
        $tpl = [];
        $tpl['container'] = View::html('index.php', $tpl);

        echo View::html('_template.php', $tpl);
    }
}