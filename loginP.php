<?php
require('model/DB/PDO.php');
require('model/DB/login_db.php');

 $email = filter_input(INPUT_POST, 'emailAddress', FILTER_DEFAULT);
 $password = filter_input(INPUT_POST, 'passWord', FILTER_DEFAULT);


 if(empty($email)){
     echo "Pls input email";

 } else if(strpos($email, '@') !== false){
     echo "Email: $email <br>";
 }else {
     echo "This is not a valid email email. <br>";
 }

 if(empty($password)){
     echo "\n Pls input password";

 } else if(strlen($password) < 9){
     echo "Password is not long enough. Must be 8 characters or longer.";
 } else{
     echo "Password: $password";
 }

check_user();
