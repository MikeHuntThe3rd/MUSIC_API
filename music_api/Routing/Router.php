<?php

namespace Music\Routing;
use Music\Endpoints\EP_bands;
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
            $asd = new EP_bands();
            echo $asd->GET($URI);
        }
        else if(str_contains($URI, "/music")){
            
        }
        else {
            echo "shit req";
        }
    }
    
    public function POSTreq($URI){
        $body = json_decode(file_get_contents('php://input'), true);
        $id = $data["id"] ?? null;
        if(str_contains($URI, "/musicians")) {

        }
        else if(str_contains($URI, "/bands")){
            $asd = new EP_bands();
            echo $asd->POST($URI, $body);
        }
        else if(str_contains($URI, "/music")){
            
        }
        else {
            echo "shit req";
        }
    }
    
    public function PATCHreq($URI){
        $body = json_decode(file_get_contents('php://input'), true);
        if(str_contains($URI, "/musicians")) {

        }
        else if(str_contains($URI, "/bands")){
            $asd = new EP_bands();
            echo $asd->UPDATE($URI, $body);
        }
        else if(str_contains($URI, "/music")){
            
        }
        else {
            echo "shit req";
        }
    }

    public function DELETEreq($URI){
        $data = json_decode(file_get_contents('php://input'), true);
        if(str_contains($URI, "/musicians")) {

        }
        else if(str_contains($URI, "/bands")){
            $asd = new EP_bands();
            echo $asd->DELETE($URI);
        }
        else if(str_contains($URI, "/music")){
            
        }
        else {
            echo "shit req";
        }
    }
}