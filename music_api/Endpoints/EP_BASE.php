<?php

namespace Music\Endpoints;
use Music\DB\db;
use Music\Endpoints\prm;

class EP_BASE {
    public db $db;
    public static string $TABLE = "";
    public const COLS = [];
    public function __construct(){
        $this->db = db::getInstance();
    }
    private function FormatParams($data): prm {
        $vals = [];
        $params = [];
        $index = 0;
        foreach($data as $curr){
            $key = ":" . static::COLS[$index];
            $vals[] = $key;
            $params[$key] = $curr;
            $index++;
        }
        return new prm($vals, $params);
    }
    public function GET($URL){
        if(str_contains($URL,  static::$TABLE . "/")){
            $arr = explode("/", $URL);
            $id = (int)end($arr);
            if($id != 0){
                $data = $this->db->SingleQuery("SELECT * FROM `". static::$TABLE ."` WHERE id = :id;", ["id" => $id]);
                $result = ["data" => $data];
                return json_encode($result);
            }
            else{
                return json_encode(["response" => "invalid id"]);
            }
        }
        else{
            $result = ["data" => $this->db->SingleQuery("SELECT * FROM `". static::$TABLE ."`;")];
            return json_encode($result);
        }
    }
    public function DELETE($URL){
        if(str_contains($URL,  static::$TABLE . "/delete/")){
            $arr = explode("/", $URL);
            $id = (int)end($arr);
            if($id != 0){
                $data = $this->db->SingleQuery("DELETE FROM `". static::$TABLE ."` WHERE id = :id;", ["id" => $id]);
                $res = "deletion: " . (string)$data["data"];
                $result = ["data" => $res];
                return json_encode($result);
            }
            else{
                return json_encode(["response" => "invalid id"]);
            }
        }
        else{
            $result = ["response" => "invalid query format"];
            return json_encode($result);
        }
    }
    public function POST($URL, $BODY){
        foreach(static::COLS as $col){
                if(!isset($BODY[$col])){
                    return json_encode(["response" => "POST body is missing parameters"]);
                }
            }
            if(count($BODY) > count(static::COLS)){
                return json_encode(["response" => "POST body has too many parameters"]);
            }
            $params = $this->FormatParams($BODY);
            $cls = implode(", ", static::COLS);
            $this->db->SingleQuery("INSERT INTO `". static::$TABLE ."` (". $cls .") VALUES(". implode(", ", $params->valNames) .");", $params->prms);
            $result = ["data" => "insert success"];
            return json_encode($result);
    }
    public function UPDATE($URL, $BODY){
        if(str_contains($URL,  static::$TABLE . "/update/")){
            $arr = explode("/", $URL);
            $id = (int)end($arr);
            if($id != 0){
                foreach(static::COLS as $col){
                    if(!isset($BODY[$col])){
                        return json_encode(["response" => "POST body is missing parameters"]);
                    }
                }
                if(count($BODY) > count(static::COLS)){
                    return json_encode(["response" => "POST body has too many parameters"]);
                }
                $params = $this->FormatParams($BODY);
                $sql = "UPDATE `". static::$TABLE ."`";
                for($i = 0 ; $i < count($params->prms); $i++){
                    if($i == 0) $sql .= " SET ";
                    else $sql .= ", ";
                    $val = static::COLS[$i] ." = ". $params->valNames[$i];
                    $sql .= ($i + 1 != count($params->prms)) ? $val : $val . " WHERE id = :id;";
                }
                $params->prms["id"] = $id;
                $this->db->SingleQuery($sql , $params->prms);
                $result = ["data" => "update success"];
                return json_encode($result);
            }
            else{
                return json_encode(["response" => "invalid id"]);
            }
        }
        else{
            $result = ["response" => "invalid query format"];
            return json_encode($result);
        }
    }
}