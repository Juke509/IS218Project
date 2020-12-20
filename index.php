<?php

require('PDO.php');
require('model/accounts_db.php');
require('model/questions_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}

switch ($action) {
    case 'show_login': {
        include('login.html');
        break;
    }

    case 'validate_login': {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if($email == NULL || $password == NULL) {
            echo "Not a valid login";
        } else{
            $userId = validate_login($email, $password);
            if($userId !== false) {
                header("Location: .?action=display_registration");
            } else{
                header("Location: .?action=display_questions&userID=$userId");
            }
        }
    }

    case 'display_registration': {
        include('registration.php');
        break;
    }

    case 'display_questions': {
        $userID = filter_input(INPUT_GET, 'userID');
        if($userID == NULL || $userID < 0) {
            header('Location: .?action=display_login');
        } else{
            $questions = get_users_questions($userID);
            include('views/display_questions.php');
        }
        break;
    }

    case 'display_question_form': {
        $userID = filter_input(INPUT_GET, $userId);
        if($userID == NULL || $userID > 0){
            header('Location: .?action=display_login');
        } else{
            include('views/question_form.php');
        }
        break;
    }

    case 'submit_question': {
        $userID = filter_input(INPUT_POST, 'userID');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');

        if($userID == NULL || $title == NULL || $body == NULL || $skills == NULL ){
            $error= "All fields are required";
            include('errors/error.php');
        } else{
            create_question($title, $body, $skills, $userID);
            header("Location: .?action=display_questions&userId=$userID");
        }

        break;
    }

    case 'logout': {
        session_destroy();
        $_SESSION = array();

        $name = session_name();
        $expire = strtotime('-1 year');

        $params = session_get_cookie_params();

        setcookie($name, '', $expire, $params['path'], $params['domain'], $params['secure'], $params['hitonly']);
    }

    default: {
        $error = 'Unknown Action';
        include('errors/error.php');
    }
}