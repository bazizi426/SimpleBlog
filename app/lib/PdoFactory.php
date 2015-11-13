<?php

namespace App\Lib;

/**
 * The Factory Design pattern
 * Class PdoFactory
 * @package App\Lib
 */
class PdoFactory
{
    protected static $pdo;

    /**
     * Connection with MySQL database
     * @return \PDO
     */
    public static function mySqlConnection()
    {
        try{
            self::$pdo = new \PDO('mysql:host='.HOST.';dbname='.NAME, USERNAME, PASSWORD, [
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'
            ]);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e){
            die("Sorry but the connection with the database has failed !");
        }
        return self::$pdo;
    }

    /**
     * Connection using PgSQL database
     * @return \PDO
     */
    public static function pgSqlConnexion()
    {
        try{
            self::$pdo = new \PDO('pgsql:host='.HOST.';dbname='.NAME, USERNAME, PASSWORD, [
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'
            ]);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e){
            die("Sorry but the connection with the database has failed !");
        }
        return self::$pdo;
    }
}