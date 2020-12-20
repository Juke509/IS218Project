<?php
require('model/DB/PDO.php');
require('model/DB/registration_db.php');

$fName = filter_input(INPUT_POST, 'firstName', FILTER_DEFAULT);
$lName = filter_input(INPUT_POST, 'lastName', FILTER_DEFAULT);
$email = filter_input(INPUT_POST,'email', FILTER_DEFAULT);
$bDay = filter_input(INPUT_POST, 'bDay', FILTER_DEFAULT);
$password = filter_input(INPUT_POST, 'passWord', FILTER_DEFAULT);


if(empty($fName)){
    echo "Pls fill in First Name <br>";
} else{
    echo "First Name: $fName <br>";
}

if(empty($lName)){
    echo "Pls fill in Last Name <br>";
} else{
    echo "Last Name: $lName <br>";
}

if(empty($email)){
    echo "Pls input email <br>";

} else if(strpos($email, '@') !== false){
    echo "Email: $email <br>";
}else {
    echo "This is not a valid email email. <br>";
}

if(empty($bDay)){
    echo "Pls fill in First Name <br>";
} else{
    echo "Birth Day: $bDay <br>";
}

if(empty($password)){
    echo "\n Pls input password <br>";

} else if(strlen($password) < 9){
    echo "Password is not long enough. Must be 8 characters or longer. <br>";
} else{
    echo "Password: $password";
}

add_user($fName, $lName, $email, $bDay, $password);
