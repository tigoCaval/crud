<?php
namespace Tigo\Crud\Interfaces;
   
interface ICrud
{
    public static function create(array $data);
    public static function all();
    public static function find($id);
    public static function update($id, array $data);
    public static function delete($id); 
    public static function execute($sql);  
}