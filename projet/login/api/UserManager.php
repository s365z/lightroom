<?php
#include 'DBconnexion.php';
class UserManager{
  private $_db;
  function __construct($db){
    $this->_db = $db;
  }

  function GetUser($method,$username){
    if($method == "ByName"){
      $query = "SELECT * FROM users WHERE username='".$username."'";
      $sth = $this->_db->prepare($query);
      $sth->execute(array(1));
      $results = $sth->fetchAll(PDO::FETCH_ASSOC);
      try {
        function GetGoodArray($array){
          if(empty($array)){
            throw new Exception();
          }else {
            return $array[0];
          }
        }
        $goodArray = GetGoodArray($results);
        return $goodArray;

      } catch (\Exception $e) {
        return 404;
      }


    }
    else{
      return 404;
    }
  }
  function CheckUserPass($method, $password){
    if($method == "ByName"){
      echo $password;
      $query = "SELECT * FROM users WHERE password='".$password."'";
      $sth = $this->_db->prepare($query);
      $sth->execute(array(1));
      $results = $sth->fetchAll(PDO::FETCH_ASSOC);
      print_r($results);
      try {
        function GetGoodArray2($array){
          if(empty($array)){
            echo '$array empty';

            throw new Exception();
          }else {
            print_r($array);
            return $array[0];
          }
        }
        $goodArray = GetGoodArray2($results);
        return $goodArray;

      } catch (\Exception $e) {
        return 404;
      }
    }
  }
  function CreateUser($username, $password, $firstname, $lastname){
    //$user = $this->GetUser("ByName", $username);
    $query = "INSERT INTO `users` (`id`, `username`, `password`, `CreatedAt`, `firstName`, `lastName`) VALUES (NULL, '".$username."', '".$password."', current_timestamp(), '".$firstname."', '".$lastname."');";
    $sth = $this->_db->prepare($query);
    $sth->execute(array(1));
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
    print_r($results);
    return $result;
  }
  function ChangePassword($username,$password, $newValue){
    echo "
    ".$username ." | ". $password." | ". $newValue."
    ";

    echo 'Function called\n';
    echo 'query called';
    $sql = "UPDATE users SET password=? WHERE username=?";
    $stmt= $this->_db->prepare($sql);
    $stmt->execute([$newValue, $username]);
    return $stmt;
  }
}
