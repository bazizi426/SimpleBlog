<?php

namespace App\Lib;
/**
 * Active record design pattern
 * Class Model
 * @package App\Lib
 */
class Model
{
    // The table name
    protected static $tableName;

    // PDO instance
    protected static $pdo;

    /**
     * Set the pdo object
     * Dependency injection
     * @param $pdo
     */
    public static function setPDO($pdo)
    {
        self::$pdo = $pdo;
    }

    /**
     * Get all records
     * @param null $tableName
     * @return mixed
     */
    public static function getAllFrom($tableName = null)
    {
        if (null === $tableName){
            $sth = self::$pdo->prepare('SELECT * FROM ' . self::$tableName);
        }else{
            $sth = self::$pdo->prepare('SELECT * FROM ' . $tableName);
        }

        $sth->execute();
        if( $sth->rowCount() > 1){
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $sth->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Get just one record
     * @param $tableName
     * @param int $id
     * @return mixed
     */
    public static function getOneFrom($tableName, $id = 1)
    {
        $sth = self::$pdo->prepare('SELECT * FROM ' . $tableName . ' WHERE id = :id');

        $sth->execute([
            ':id' => (int) $id
        ]);
        return $sth->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Find all records witch are respect the conditions (WHERE, AND)
     * @param $tableName
     * @param array $conds
     * @return mixed
     */
    public static function findFromBy($tableName, $conds = [])
    {
        $i = 1;
        $array = [];
        $sth = '';

        if(count($conds) === 1) {
            foreach($conds as $field => $value){
                $sth = self::$pdo->prepare("SELECT * FROM {$tableName} WHERE {$field} = :$field");
                $array[":{$field}"] = Helper::filter($value);
            }

        } else if(count($conds) > 1){
            $sql = "SELECT * FROM {$tableName} WHERE ";
            foreach($conds as $field => $value){
                if( count($conds) === $i ){
                    $sql .= "{$field} = :{$field}";
                    $array[":{$field}"] = Helper::filter($value);
                } else {
                    $sql .= "{$field} = :{$field} AND ";
                    $array[":{$field}"] = Helper::filter($value);
                    $i++;
                }
            }

            $sth = self::$pdo->prepare($sql);
        }

        $sth->execute($array);

        if($sth->rowCount() > 1){
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $sth->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Update a record
     * @param $tableName
     * @param $values
     * @param int $id
     * @return bool
     */
    public static function update($tableName, $values, $id = 0)
    {
        $sql2 = "";
        $i = 1;
        $array = [];

        foreach($values as $field => $value) {
            if( count($values) === $i ) {
                $sql2 .= "{$field} = :{$field}";
                $array[":{$field}"] = Helper::filter($value);
            } else {
                $sql2 .= "{$field} = :{$field}, ";
                $array[":{$field}"] = Helper::filter($value);
                $i++;
            }
        }

        $id = (int) $id;
        $sql = "UPDATE {$tableName} SET " . $sql2 . " WHERE id=$id";

        $sth = self::$pdo->prepare($sql);
        $sth->execute($array);

        if($sth->rowCount() >= 1) {
            return true;
        }
        return false;
    }

    /**
     * Insert a record
     * @param $tableName
     * @param $values
     * @return bool
     */
    public static function insert($tableName, $values)
    {
        $sql = "INSERT INTO {$tableName} SET ";
        $i = 1;
        $array = [];
        foreach($values as $field => $value) {
            if( count($values) === $i ) {
                $sql .= "{$field} = :{$field}";
                $array[":{$field}"] = Helper::filter($value);
            } else {
                $sql .= "{$field} = :{$field}, ";
                $array[":{$field}"] = Helper::filter($value);
                $i++;
            }
        }

        $sth = self::$pdo->prepare($sql);
        $sth->execute($array);

        if($sth->rowCount() >= 1) {
            return true;
        }
        return false;
    }

    /**
     * Delete a record
     * @param $tableName
     * @param int $id
     * @return bool
     */
    public static function delete($tableName, $id = 0)
    {
        $id = (int) $id;
        $sql = "DELETE FROM {$tableName} WHERE id={$id}";

        $sth = self::$pdo->prepare($sql);
        $sth->execute();

        if($sth->rowCount() >= 1) {
            return true;
        }
        return false;
    }
}