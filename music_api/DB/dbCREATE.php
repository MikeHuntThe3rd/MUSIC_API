<?php

namespace Music\DB;
use Music\DB\db;
use Pdo;

class dbCREATE extends db {
    public function Exists():bool {
        $result = $this->SingleQuery("SELECT SCHEMA_NAME
            FROM INFORMATION_SCHEMA.SCHEMATA
            WHERE SCHEMA_NAME = '". self::DEFAULT_CONFIG["database"] ."';");
        return !empty($result);
    }
    public function Create(){
        $this->getPdo()->setAttribute(PDO::MYSQL_ATTR_MULTI_STATEMENTS, true);
        $this->getPdo()->exec(file_get_contents("music.sql"));
        $this->getPdo()->setAttribute(PDO::MYSQL_ATTR_MULTI_STATEMENTS, false);
    }
}