 - [HOME](https://github.com/tigoCaval/crud)
 
# Configure database
     directory: src/Interfaces/IConnect.php
  The default configuration uses the sqlite database.
  
  You can also configure the database of your choice.
  
  Note: **Check if the PDO - PHP database extension is supported**
    
 ```php
  /*const DATABASE = "mysql:"; 
    const HOST = "host=localhost;";
    const DBNAME = "dbname=name";
    const USER = "";
    const PASS = "";*/
    
    const DATABASE = "sqlite:".__DIR__."../../database.db"; 
    const HOST = "";
    const DBNAME = "";
    const USER = null;
    const PASS = null;
 ```
# Methods

<table style="width:100%">
  <tr>
    <th>Method</th>
    <th>Description</th>
  </tr>
  <tr>
    <td>create(array $data)</td>
    <td>Add new entries</td>
  </tr>
  <tr>
    <td>all( )</td>
    <td>List all entries</td>
  </tr>
  <tr>
    <td>find($id)</td>
    <td>Find entry by id</td>
  </tr>
  <tr>
    <td>update($id, array $data)</td>
    <td>Update or edit existing entries</td>
  </tr> 
  <tr>
    <td>delete($id)</td>
    <td>Remove existing entries</td>
  </tr>
  <tr>
    <td>execute($sql)</td>
    <td>Execute SQL statement</td>
  </tr>
</table>

# Starting a project
 Somewhere in your project, you may need to use autoload
 ```php
 include __DIR__ ."/vendor/autoload.php";
 ```
 Let's assume you have a table with the following assignments
  ```
   users (id,name,age)
 ```
 
 Creating the User class
 
 ```php
   use Tigo\Crud\Abstracts\AbsCrud; //import class

   class User extends AbsCrud
   {
        /**
        * Get Table
        */
       protected static function getTable()
       {
           return "users";
       }
         /**
         * Get Primary key
         */
       protected static function getPrimaryKey()
       {
           return "id";
       }
   }
 ```
 
 
 
 
 
 
 
 
 
 
 
