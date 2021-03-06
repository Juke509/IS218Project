<?php
    function add_question($title, $body, $skills, $userId){
        global $db;

        $query = 'INSERT INTO questions
                    (title, body, skills, ownerid)
                    Values
                        (:title, :body, :skills, :ownerid)';

        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':body', $body);
        $statement->bindValue(':skills', $skills);
        $statement->bindValue(':ownerid', $userId);
        $statement->execute();
        $statement->closeCursor();
    }

    function get_users_questions ($userId) {
        global $db;

        $query = 'SELECT * FROM questions WHERE ownerid = :userId';
        $statement = $db->prepare($query);
        $statement->bindValue(':userId', $userId);
        $statement->execute();

        $questions = $statement->fetchAll();
        $statement->closeCursor();

        return $questions;
    }