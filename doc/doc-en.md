 - [HOME](https://github.com/tigoCaval/crud)

# Configure database
     directory: src/Interfaces/IConnect.php
  The default configuration uses the sqlite database.
  
  You can also configure the database of your choice.
  
  Note: Check the PDO - PHP database extension available.
    
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
