<?php

namespace app\core\form;

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s id="product_form">', $action, $method);
        return new Form();
    }

    public static function end()
    {
       echo '</form>';
    }

    public function field($model, $attribute)
    {
        return new Field($model, $attribute);
    }
}