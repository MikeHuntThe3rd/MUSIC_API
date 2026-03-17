<?php

namespace Music\Endpoints;
use Music\Endpoints\EP_BASE;

class EP_music extends EP_BASE {
    public static string $TABLE = "music";
    public const COLS = ["name", "track_PATH", "icon_PATH", "album", "creator_id"];

    public function POST($BODY){
        foreach(static::COLS as $col){
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