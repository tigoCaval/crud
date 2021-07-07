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
# Method

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
