<?php
function check_user($email, $password){
    global $db;

    $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user = $statement->fetchAll();
    $statement->closeCursor();

    $userId = $user['id'];

    if(count($user) > 0){
        return $userId;
    } else{
        return true;
    }
}