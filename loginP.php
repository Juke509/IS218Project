<?php
require('PDO.php');
require('login_db.php');

$userId = check_user($email, $password);

if($userId !== false) {
    include('registration.html');
} else {
    $questions = get_users_questions($userId);
    include('questionDisplay.php');
}




 /*if(empty($email)){
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
*/

