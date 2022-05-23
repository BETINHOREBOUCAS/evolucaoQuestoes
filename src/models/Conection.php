<?php
namespace src\models;
use \core\Model;
use \src\Config;

class Conection extends Model {

    public static function sqlSelect() {
        try {
            $pdo = new \PDO(Config::DB_DRIVER.":dbname=".Config::DB_DATABASE.";host=".Config::DB_HOST, Config::DB_USER, Config::DB_PASS);
            return $pdo;
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}