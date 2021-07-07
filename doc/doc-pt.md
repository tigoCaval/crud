- [HOME](https://github.com/tigoCaval/crud)
 
# Configurar banco de dados
     diretório: src/Interfaces/IConnect.php
  A configuração padrão utiliza o banco de dados sqlite.

  Você também pode configurar o banco de dados de sua escolha.

  Obs: Verifique se a extensão do banco de dados PDO - PHP é compatível
    
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
# Métodos

<table style="width:100%">
  <tr>
    <th>Método</th>
    <th>Descrição</th>
  </tr>
  <tr>
    <td>create(array $data)</td>
    <td>Adicionar novas entradas</td>
  </tr>
  <tr>
    <td>all( )</td>
    <td>Listar todas as entradas</td>
  </tr>
  <tr>
    <td>find($id)</td>
    <td>Encontrar entrada por id</td>
  </tr>
  <tr>
    <td>update($id, array $data)</td>
    <td>Atualizar ou editar entradas existentes</td>
  </tr> 
  <tr>
    <td>delete($id)</td>
    <td>Remover entradas existentes</td>
  </tr>
  <tr>
    <td>execute($sql)</td>
    <td>Executar a instrução SQL</td>
  </tr>
</table>

# Iniciando um projeto
 Em algum lugar do seu projeto, pode ser necessário usar o autoload
 ```php
 include __DIR__ ."/vendor/autoload.php";
 ```
 Vamos supor que você tenha uma tabela com as seguintes atribuições
  ```
   users (id,name,age)
 ```
 
 Criando a classe User
 
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
 
 Agora a classe "User" pode utilizar todos os recursos da classe "AbsCrud"
 - **EXEMPLO: Adicionar novas entradas**
 ```php
     $data = ['name'=>'Hi','age'=>1];
     User::create($data);
 ```
  - **EXEMPLO: Liste todas as entradas**
 ```php
    foreach(User::all() as $item){
      echo "ID: ".$item->id."<br>";
      echo "Name: ".$item->name."<br>";
      echo "Age: ".$item->age."<br>";
      echo "----------<br>";
   }
 ```
  - **EXEMPLO: Encontre entrada por id**
 ```php
    $id = 1;
    foreach(User::find($id) as $item){
      echo "ID: ".$item->id."<br>";
      echo "Name: ".$item->name."<br>";
      echo "Age: ".$item->age."<br>";
      echo "----------<br>";
   }
 ```
  - **EXEMPLO: Atualizar ou editar entradas existentes**
 ```php
     $id = 1;
     $data = ['name'=>'Hiii','age'=>8];
     User::update($id,$data);
 ```
  - **EXEMPLO: Remover entradas existentes**
 ```php
     $id = 1;
     User::delete($id);
 ```
   - **EXEMPLO: execute a instrução SQL**
 ```php
     $sql = "select * from users";
     User::execute($sql);
 ```
