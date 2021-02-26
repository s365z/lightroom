<?php

include 'UserManager.php';
include 'DBconnexion.php';
$data = json_decode(file_get_contents('php://input'), true);
print_r($data);
print_r($_POST);

$md5PassHash = md5 ($data['password'] , false );
$db = new DBconnexion();
$dbCo = $db->dbConnect();
$manager = new UserManager($dbCo);
$user = $manager->GetUser("ByName", $data['username']);
echo $data['action'];
if($data['action'] == "login"){
  $action = 'login';
  if($user == 404){
    echo 'error 404 username not found';
    header("HTTP/1.1 404 USER");
  } else {
    $pass = $manager->CheckUserPass("ByName",$md5PassHash);
    if($pass == 404){
      header("HTTP/1.1 404 PASS");

    } else {
      header("HTTP/1.1 200 PASS");

    }
  }
} elseif ($data['action'] == "register"){
  if($user==404){
    if(strlen($data['username'])>=5){
      if(strlen($data['password'])>=8){
        if(strlen($data['lastname'])>=5){
          if(strlen($data['firstname'])>=5){
            $rester = $manager->CreateUser($data['username'], $md5PassHash,$data['firstname'],$data['lastname']);
          }
        }
      }
    }
  } else {
    echo "can't create user beceause its here";
  }

} elseif ($data['action'] == 'ChangePassword') {
  echo 'Function called\n';
  $pass = md5 ($data['password'] , false);
  $username = $data['username'];
  $newpass = md5 ($data['newpass'] , false );
  print_r( 'calling the manager for change password\n');

  $result = $manager->ChangePassword($username, $pass , $newpass);
  if($result){
    print_r( $result);

  }
  print_r( $result);
  echo 'End';

}

?>
