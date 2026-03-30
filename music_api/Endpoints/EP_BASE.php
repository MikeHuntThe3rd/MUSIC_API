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
    protected function FormatParams($data): prm {
        $formatted = [];
        foreach(static::COLS as $col){
            $formatted[$col] = (isset($data[$col])) ? $data[$col] :  null;
        }
        $vals = [];
        $params = [];
        $index = 0;
        foreach($formatted as $curr){
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
                return json_encode($data);
            }
            else{
                return json_encode(["success" => false, "data" => "invalid id"]);
            }
        }
        else{
            return json_encode($this->db->SingleQuery("SELECT * FROM `". static::$TABLE ."`;"));
        }
    }
    public function DELETE($URL){
        if(str_contains($URL,  static::$TABLE . "/delete/")){
            $arr = explode("/", $URL);
            $id = (int)end($arr);
            if($id != 0){
                return json_encode($this->db->SingleQuery("DELETE FROM `". static::$TABLE ."` WHERE id = :id;", ["id" => $id]));
            }
            else{
                return json_encode(["success" => false, "data" => "invalid id"]);
            }
        }
        else{
            $result = ["success" => false, "data" => "invalid query format"];
            return json_encode($result);
        }
    }
    public function POST($BODY){
        foreach(static::COLS as $col){
                if(!isset($BODY[$col])){
                    return json_encode(["success" => false, "data" => "POST body is missing parameters"]);
                }
            }
            if(count($BODY) > count(static::COLS)){
                return json_encode(["success" => false, "data" => "POST body has too many parameters"]);
            }
            $params = $this->FormatParams($BODY);
            $cls = implode(", ", static::COLS);
            return json_encode($this->db->SingleQuery("INSERT INTO `". static::$TABLE ."` (". $cls .") VALUES(". implode(", ", $params->valNames) .");", $params->prms));
    }
    public function UPDATE($URL, $BODY){
        if(str_contains($URL,  static::$TABLE . "/update/")){
            $arr = explode("/", $URL);
            $id = (int)end($arr);
            if($id != 0){
                foreach(static::COLS as $col){
                    if(!isset($BODY[$col])){
                        return json_encode(["success" => false, "data" => "POST body is missing parameters"]);
                    }
                }
                if(count($BODY) > count(static::COLS)){
                    return json_encode(["success" => false, "data" => "POST body has too many parameters"]);
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
                return json_encode($this->db->SingleQuery($sql , $params->prms));
            }
            else{
                return json_encode(["success" => false, "data" => "invalid id"]);
            }
        }
        else{
            $result = ["success" => false, "data" => "invalid query format"];
            return json_encode($result);
        }
    }
}