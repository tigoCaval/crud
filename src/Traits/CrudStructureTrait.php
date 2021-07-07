<?php
namespace Tigo\Crud\Traits;

/** 
 * @author Tiago A C Pereira <tiagocavalcante57@gmail.com>
 */
trait CrudStructureTrait
{
    protected static $insert = [
        "INSERT",
        "INTO",
        "table_name"=>"",
        "(",
        "column"=>"",
        ")",
        "VALUES",
        "(",
        "value"=>"",
        ");"
    ] ;

    protected static $selectAll = [
       "SELECT",
       "*",
       "FROM",
       "table_name"=>"",
       ";"
    ];

    protected static $select = [
        "SELECT",
        "*",
        "FROM",
        "table_name"=>"",
        "WHERE",
        "primary"=>"",
        ";"
     ];

    protected static $update = [
       "UPDATE",
       "table_name"=>"",     
       "SET",
       "column"=>"",
       "WHERE",
       "primary"=>"",
       ";",    
    ];

    protected static $delete = [
       "DELETE",
       "FROM",
       "table_name"=>"",
       "WHERE",
       "primary"=>"",
       ";"
    ];
}