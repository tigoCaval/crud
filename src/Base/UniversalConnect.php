<?php
namespace Tigo\Crud\Base;

use Tigo\Crud\Interfaces\IConnect;

/**
 * Connect to database
 * 
 * @author Tiago A C Pereira <tiagocavalcante57@gmail.com>
 */
class UniversalConnect implements IConnect
{
    private static $database = IConnect::DATABASE;
    private static $host = IConnect::HOST;
    private static $dbname = IConnect::DBNAME;
    private static $user = IConnect::USER;
    private static $pass = IConnect::PASS;
    private static $dsn;

    public static function doConnection()
    {
        
        self::$dsn = self::$database.self::$host.self::$dbname;
         
        try{
           $conn = new \PDO(self::$dsn, self::$user, self::$pass, array(\PDO::ATTR_PERSISTENT => true));
           echo "<script>console.log('Connection successful!')</script>";
           return $conn;
        } catch (\PDOException $e) {
           exit("Connection failed error: ".$e->getMessage()."<br/>");
        }

    }
}
