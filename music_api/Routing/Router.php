<?php

namespace Music\Routing;

use Music\Endpoints\EP_bands;
use Music\Endpoints\EP_creators;
use Music\Endpoints\EP_music;
use Music\Endpoints\EP_musicians;

class Router {
    private array $routes = [
        "/musicians" => EP_musicians::class,
        "/bands"     => EP_bands::class,
        "/music"     => EP_music::class,
        "/creators"  => EP_creators::class,
    ];
    public function ReqHandle(){
        $method = strtoupper($_SERVER["REQUEST_METHOD"]);
        $uri    = $_SERVER["REQUEST_URI"];
        $body   = json_decode(file_get_contents('php://input'), true);
        foreach ($this->routes as $route => $class) {
            if (str_contains($uri, $route)) {
                $api = new $class();

                $return = match ($method) {
                    "GET"    => print $api->GET($uri),
                    "POST"   => print $api->POST($uri, $body),
                    "PATCH"  => print $api->UPDATE($uri, $body),
                    "DELETE" => print $api->DELETE($uri),
                    default  => "error method not allowed"
                };
                return json_encode($return);
            }
        }

        echo json_encode(["response" => "error method not found"]);
    }
}