<?php
 //This task was required from Eng. Mohamed Amr

class database {
    //connection
    private  object $conn; 
    private  string $host =     'localhost';
    private  int    $port =     3306;
    private  string $user =     'root';
    private  string $password = ''; 
    private  string $database = 'db'; 
    //sql
    private   string $sql ; 
    private  string $tableName;  
    //errors 
    public   array  $error = ['connection'=>'']; 

    public function __construct (){
        $this->connect(); 
    }

    public function __destruct (){
        $this->conn->close(); 
    }

    //open connection to database 
    private function connect() : void {
        $this->conn = new mysqli(
            $this->host ,
            $this->user ,
            $this->password ,
            $this->database ,
            $this->port); 
    }

    //change current database server
    public function server(
        string $host,
        string $user ,
        string $password,
        string $database,
        int $port = 3306 ): bool {

        try{
            $this->conn->close(); 
            $this->conn = new mysqli($host , $user , $password , $database , $port); 
            return true ; 
        }catch (exception $error){
            $this->error['connection'] = $error; 
            return false; 
        }
                    
    }

    //return current server connection information 
    public function serverInfo(): array {
    return [
        'host' => $this->host,
        'port' => $this->port , 
        'user' => $this->user,
        'database' => $this->database]; 
    }

    //select database 
    public function use (string $databaseName ):void {
        $this->conn->close(); 
        $this->database = $databaseName; 
        $this->connect(); 

    }
    
    //return  current sql statment 
    public function getSQL():string  {
        return  $this->sql ; 
    }

    //set table name , return this instance 
    public function table (string $table):object {
        $this->tableName = $table;  
        return $this;  
    }

    //set 'select' sql statment , return this instance
    public function select (string $column) : object{
        $this->sql = "SELECT ".$column." FROM `".$this->tableName."` "; 
        return $this; 
    }

    //add 'where' to sql statment , return this instance
    public function where (string $column , string $operator , string $value): object{
        $this->sql .= "WHERE $column $operator '$value' ";
        return $this;  
    }
    
    //add 'and' to sql statment , return this instance
    public function andWhere (string $column , string $operator , string $value): object{
        $this->sql .= "and $column $operator '$value' ";
        return $this;  
    }

    //add 'or' to sql statment , return this instance
    public function orWhere (string $column , string $operator , string $value): object{
        $this->sql .= "or  $column $operator '$value' ";
        return $this;  
    }
    
    public function innerJoin (string $tableToJoin, string $relationRight , string $operator , string $relationLeft): object{
        $this->sql .= "INNER JOIN `$tableToJoin` on $relationRight $operator  $relationLeft ";
        return $this;  
    }

    public function leftJoin (string $tableToJoin, string $relationRight , string $operator , string $relationLeft): object{
        $this->sql .= "RIGHT JOIN `$tableToJoin` on $relationRight $operator  $relationLeft ";
        return $this;  
    } 

    public function rightJoin (string $tableToJoin, string $relationRight , string $operator , string $relationLeft): object{
        $this->sql .= "RIGHT JOIN `$tableToJoin` on $relationRight $operator  $relationLeft ";
        return $this;  
    } 

    //execute 'select' query , return all rows 
    public function all (): array{
       $result = $this->conn->query($this->sql);  
       return $result->fetch_all(); 
    }

    //execute 'select' query , return first rows[assoc] 
    public function first(): array {
       $result = $this->conn->query($this->sql);  
       return $result->fetch_assoc(); 
    }

    //execute 'select' query , return last rows 
    public function last(): array {
       $result = $this->conn->query($this->sql);  
       return end($result->fetch_all()); 
    }

    //set 'update' sql statment , return this instance
    public function update($column , $value):object {
        $this->sql = "UPDATE `".$this->tableName."` SET $column = '$value' "; 
        return $this; 
    }

    //set 'delete' sql statment , return this instance
    public function delete ():object{
        $this->sql= "DELETE FROM $this->tableName "; 
        return $this; 
    }

    //execute 'insert' query , return count of affected rows 
    public function insert(array $data):int{
        $keys='' ; $values='';
        foreach ($data as $key=>$value){
           $keys .= $key. ' , '; 
           $values .= " '$value' , "; 
        }
        $this->sql= "INSERT INTO $this->tableName (".rtrim($keys , ', ').") values (".rtrim($values , ', ').")"; 
        return $this->exec();  
    }

      public function exec():int {
        $this->conn->query($this->sql);
        return $this->conn->affected_rows; 
    }
}

