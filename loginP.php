<?php
 $email = filter_input(INPUT_POST, 'emailAddress', FILTER_DEFAULT);
 $password = filter_input(INPUT_POST, 'passWord', FILTER_DEFAULT);

 if(empty($email)){
     echo "Pls input email";

 } else if(strpos($email, '@') !== false){
     echo "This is an email";
 }else {
     echo "This is not a valid email email.";
 }

 if(empty($password)){
     echo "\n Pls input password";

 } else if(strlen($password) < 9){
     echo "Password is not long enough. Must be 8 characters or longer.";
 } else{
     echo "This is a gud password.";
 }
