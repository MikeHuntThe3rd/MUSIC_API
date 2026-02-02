<?php

namespace Music\Views;
use Music\Views\layout;

class Render {
    public static function includeFile($name, $variables = [], $css = [], $script = []){
        $path = __DIR__ . DIRECTORY_SEPARATOR . "$name". ".php";
        if(file_exists($path)){
            layout::header($css, $script);
            extract($variables);
            include $path;
            layout::footer();
        }
    }
}