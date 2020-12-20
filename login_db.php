<?php
function check_user($email, $password){
    global $db;

    $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();

    if(count($user) > 0){
        echo "valid login";
    } else{
        echo 'false';
    }
}