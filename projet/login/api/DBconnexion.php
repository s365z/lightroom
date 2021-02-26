<?php
include 'Dbconfig.php';
class DBconnexion extends Dbconfig{
  
  function dbConnect(){
    return new PDO($this->dsn, $this->userName, $this->passCode);
  }

  function dbDisconnect() {
        $this -> connectionString = NULL;
        $this -> sqlQuery = NULL;
        $this -> dataSet = NULL;
        $this -> databaseName = NULL;
        $this -> hostName = NULL;
        $this -> userName = NULL;
        $this -> passCode = NULL;
    }
}
?>
