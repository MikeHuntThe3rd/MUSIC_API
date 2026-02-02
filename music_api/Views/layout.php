<?php

namespace Music\Views;

class layout {
    public const MSG_COLORS = [
    'text' => 'width: 100%; height: 100px; background-color: transparent; color: #000; border: 1px solid #ddd;',
    'info' => 'width: 100%; height: 100px; background-color: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb;',
    'success' => 'width: 100%; height: 100px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;',
    'warning' => 'width: 100%; height: 100px; background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba;',
    'danger' => 'width: 100%; height: 100px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;',
    'error' => 'width: 100%; height: 100px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;'
];
    public static function header($css = [], $script = []){
        echo <<<HTML
        <!DOCTYPE html>
        <html lang="hu">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Music</title>
        
        HTML;
        foreach($script as $file){
            echo <<<HTML
                <script defer src="/js/$file.js"></script>
            HTML;
        }
        foreach($css as $file){
            echo <<<HTML
                <link href="/css/$file.css" rel="stylesheet">
            HTML;
        }
        echo <<<HTML
            <link href="/fontawesome/css/all.css" rel="stylesheet">
        HTML;
        echo <<<HTML
        </head>
        <body>
        HTML;
        self::message();
    }
    public static function message(){
        if(isset($_SESSION["msg"])){
            $style = self::MSG_COLORS[$_SESSION["msg"][0]];
            $txt = $_SESSION["msg"][1];
            echo <<<HTML
            <style>
                .txt {
                    {$style}
                    width: 100%;
                    height: 100px;
                    display: flex;
                    align-items: center;          
                    justify-content: space-between;
                    border-radius: 5px;
                    box-sizing: border-box;
                    font-family: Arial, sans-serif;
                    font-size: 16px;
                    padding: 0 20px;
                }

                .txt-content {
                    flex: 1;                      
                    text-align: left;          
                }

                .exit {
                    color: #000;                  
                    background: none;            
                    border: none;
                    font-size: 20px;
                    font-weight: bold;
                    cursor: pointer;
                    user-select: none;
                }

                .exit:hover {
                    opacity: 0.7;
                }
            </style>

            <div class="txt" id="message">
                <div class="txt-content">{$txt}</div>
                <button class="exit" onclick="this.parentElement.style.display='none'">X</button>
            </div>
            HTML;
            unset($_SESSION["msg"]);
        }
    }
    public static function footer() {
        echo <<<HTML
        </div>
            <footer> 
                <hr>
                <p>2001 &copy; smegma zsaláb</p>
            </footer>
        </body>
        </html>
        HTML;
    }
}