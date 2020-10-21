<?php
$fName = filter_input(INPUT_POST, 'firstName', FILTER_DEFAULT);
$lName = filter_input(INPUT_POST, 'lastName', FILTER_DEFAULT);
$email = filter_input(INPUT_POST,'email', FILTER_DEFAULT);
$bDay = filter_input(INPUT_POST, 'bDay', FILTER_DEFAULT);
$password = filter_input(INPUT_POST, 'passWord', FILTER_DEFAULT);


if(empty($fName)){
    echo "Pls fill in First Name";
}

if(empty($lName)){
    echo "Pls fill in First Name";
}

if(empty($email)){
    echo "Pls input email";

} else if(strpos($email, '@') !== false){
    echo "this is an email";
}else {
    echo "This is not a valid email email.";
}

if(empty($bDay)){
    echo "Pls fill in First Name";
}

if(empty($password)){
    echo "\n Pls input password";

} else if(strlen($password) < 9){
    echo "Password is not long enough. Must be 8 characters or longer.";
} else{
    echo "This is a gud password.";
}
