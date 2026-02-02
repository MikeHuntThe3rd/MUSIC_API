<?php

namespace Music\Routing;

class Router{
    public function ReqHandle(){
        $MethodType = strtoupper($_SERVER["REQUEST_METHOD"]);
        $ReqURI = $_SERVER["REQUEST_URI"];
        switch ($MethodType){
            case "GET":
                $this->GETreq($ReqURI);
                break;
            case "POST":
                $this->POSTreq($ReqURI);
                break;
            case "PATCH":
                $this->PATCHreq($ReqURI);
                break;
            case "DELETE":
                $this->DELETEreq($ReqURI);
                break;
            default:
                echo "error method not found";
                break;
        }
    }
    public function GETreq($URI){
        if(str_contains($URI, "/musicians")) {

        }
        else if(str_contains($URI, "/bands")){

        }
        else if(str_contains($URI, "/music")){
            
        }
        else {
            echo "shit req";
        }
    }
    
    public function POSTreq($URI){
        $data = json_decode(file_get_contents('php://input'));
        $id = $data["id"] ?? null;
        if(str_contains($URI, "/musicians")) {

        }
        else if(str_contains($URI, "/bands")){

        }
        else if(str_contains($URI, "/music")){
            
        }
        else {
            echo "shit req";
        }
    }
    
    public function PATCHreq($URI){
        $data = json_decode(file_get_contents('php://input'));
        if(str_contains($URI, "/musicians")) {

        }
        else if(str_contains($URI, "/bands")){

        }
        else if(str_contains($URI, "/music")){
            
        }
        else {
            echo "shit req";
        }
    }

    public function DELETEreq($URI){
        $data = json_decode(file_get_contents('php://input'));
        if(str_contains($URI, "/musicians")) {

        }
        else if(str_contains($URI, "/bands")){

        }
        else if(str_contains($URI, "/music")){
            
        }
        else {
            echo "shit req";
        }
    }
}