<?php
namespace Tigo\Crud\Abstracts;

use Tigo\Crud\Interfaces\ICrud;
use Tigo\Crud\Base\UniversalConnect;
   
/**
 *  The abstract class AbsCrud is responsible
 *  for providing resources for interaction
 *  with the database,
 *  applying the main operations:
 *  create, read, update and delete.
 * 
 *  @author Tiago A C Pereira <tiagocavalcante57@gmail.com>
 */
abstract class AbsCrud extends AbsCrudStructure implements ICrud
{
    
    /**
     * Get table name
     *
     * @return string
     */
    abstract protected static function getTable(); 

    /**
     * Get the name of the primary key
     *
     * @return string
     */
    abstract protected static function getPrimaryKey();
        
    /**
     * Get the database connection
     *
     * @static
     */
    protected static $conn;

    public function __construct()
    {
        self::$conn = UniversalConnect::doConnection();
    }
    
    /**
     * Insert data into the database table
     *
     * @static
     * @param array $data
     * @return mixed
     */
    public static function create(array $data)
    {
       $sql = static::sqlInsert(static::getTable(),$data);  
       if(self::$conn->query($sql))
          self::$conn = null;  
       else
          exit(var_export(self::$conn->errorinfo(), TRUE));
       return self::$conn;   
    }
    
    /**
     * Get all data in the database table
     * 
     * @static
     * @return mixed
     */
    public static function all()
    {
        $data = [];
        $sql = self::sqlSelectAll(static::getTable());
        if($result = self::$conn->query($sql)){
            foreach($result as $key=>$item){
               $data[] = (object) $item;  
            }
            self::$conn = null;           
         }
         else
            exit(var_export(self::$conn->errorinfo(), TRUE));
         return $data;   
    }
    
    /**
     * Get and find specific data in the database table
     * 
     * @static
     * @param int $id
     * @return mixed
     */
    public static function find($id)
    {
        $data = [];
        $sql = self::sqlSelect(static::getTable(),static::getPrimaryKey(),$id);
        if($result = self::$conn->query($sql)){
            foreach($result as $key=>$item){
               $data[] = (object) $item;  
            }
            self::$conn = null;           
         }
         else
            exit(var_export(self::$conn->errorinfo(), TRUE));
         return $data;  
    }
    
    /**
     * Update data in the database table
     * 
     * @static
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public static function update($id, array $data)
    {
        $sql = self::sqlUpdate(static::getTable(),static::getPrimaryKey(),$id,$data);
        if(self::$conn->query($sql))
            self::$conn = null;  
         else
           exit(var_export(self::$conn->errorinfo(), TRUE)); 
        return self::$conn;   
    }
    
    /**
     * Delete data in database table
     * 
     * @static
     * @param int $id
     * @return mixed
     */
    public static function delete($id)
    {
        $sql = self::sqlDelete(static::getTable(),static::getPrimaryKey(),$id);       
        if(self::$conn->query($sql))
            self::$conn = null;  
        else
            exit(var_export(self::$conn->errorinfo(), TRUE)); 
        return self::$conn;    
    }
        
    /**
     * Execute an SQL statement
     * 
     * @static
     * @param string $sql
     * @return mixed
     */
    public static function execute($sql)
    {
      $data = self::sqlQuery($sql); 
      if($result = self::$conn->query($data))
         self::$conn = null;  
      else
        exit(var_export(self::$conn->errorinfo(), TRUE));
      return $result;    
    }
    
}