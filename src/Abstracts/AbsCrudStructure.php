<?php
namespace Tigo\Crud\Abstracts;

use Tigo\Crud\Interfaces\ICrudSql;
use Tigo\Crud\Traits\CrudStructureTrait;

/**
 * The abstract class AbsCrudStructure 
 * is responsible for providing SQL statement
 * 
 * @author Tiago A C Pereira <tiagocavalcante57@gmail.com>
 */
abstract class AbsCrudStructure implements ICrudSql
{
      
    use CrudStructureTrait;
       
    /**
     * Get SQL insert statement
     *
     * @static
     * @param string $table
     * @param array $data
     * @return string
     */
    public static function sqlInsert($table, array $data)
    { 
       $check = 0;
       $sql = self::$insert;
       $sql['table_name'] = $table; 
       foreach($data as $key=>$value){ 
           $check++;
           $sql['column'] .= ($check == count($data) ? $key : $key.',');
           $sql['value']  .= ($check == count($data) ? "'$value'" : "'$value',");  
       }
       $sql = implode(" ",$sql);    
       return $sql;
    }
    
    /**
     * Get SQL statement to return all data from table
     *
     * @static
     * @param string $table
     * @return string
     */
    public static function sqlSelectAll($table)
    {
        $sql = self::$selectAll;
        $sql['table_name'] = $table;
        $sql = implode(" ",$sql);
        return $sql;         
    }
    
    /**
     * Get the SQL statement to select a given data
     *
     * @static
     * @param string $table
     * @param string $primary
     * @param int $id
     * @return string
     */
    public static function sqlSelect($table, $primary, $id)
    {
        $primaryKey = $primary;
        $sql = self::$select;
        $sql['table_name'] = $table;
        $sql['primary'] = "$primaryKey = $id";
        $sql = implode(" ",$sql);
        return $sql;  
    }
    
    /**
     * Get SQL update statement
     *
     * @static
     * @param string $table
     * @param string $primary
     * @param int $id
     * @param array $data
     * @return string 
     */
    public static function sqlUpdate($table, $primary, $id, array $data)
    {
         $check = 0;
         $primaryKey = $primary;
         $sql = self::$update;
         $sql['table_name'] = $table; 
         foreach($data as $key=>$value){ 
            $check++;
            $sql['column'] .= ($check == count($data) ? $key."="."'$value'" : $key."="."'$value'".","); 
         }
         $sql['primary'] .= "$primaryKey = $id";
         $sql = implode(" ",$sql);   
         return $sql;
    }
    
    /**
     * Get SQL delete statement
     *
     * @static
     * @param string $table
     * @param string $primary
     * @param int $id
     * @return string
     */
    public static function sqlDelete($table,$primary,$id)
    {
       $primaryKey = $primary;
       $sql = self::$delete;
       $sql['table_name'] = $table;
       $sql['primary'] = "$primaryKey = $id";
       $sql = implode(" ",$sql);   
       return $sql;
    }
    
    /**
     * Get an SQL statement
     *
     * @static
     * @param string $sql
     * @return string
     */
    public static function sqlQuery($sql)
    {
        return is_string($sql) ? $sql : exit("[#Error]:'The value provided must be a string'");
    }
    
}