<?php
namespace Tigo\Crud\Interfaces;

interface ICrudSql
{
    public static function sqlInsert($table, array $data);
    public static function sqlSelectAll($table);
    public static function sqlSelect($table,$primary,$id);
    public static function sqlUpdate($table,$primary,$id, array $data);
    public static function sqlDelete($table,$primary,$id); 
    public static function sqlQuery($sql);   
}