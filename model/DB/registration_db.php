<?php
    function add_user($fName, $lName, $email, $bDay, $password){
        global $db;

        $date = new DateTime($bDay);

        $query = 'INSERT INTO accounts
                    (email, fname, lname, birthday, password)
                VALUES 
                    (:email, :fname, :lname, :birthday, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':fname', $fName);
        $statement->bindValue(':lname', $lName);
        $statement->bindValue(':birthday', $date->format('Y-m-d H:i:s'));
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    }
