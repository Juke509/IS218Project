<?php
$title = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
$body = filter_input(INPUT_POST, 'questionBdy', FILTER_DEFAULT);
$skills = filter_input(INPUT_POST, 'skills', FILTER_DEFAULT);

if(empty($title)){
    echo "Pls fill in Name";
} else  if(strlen($title) < 4){
    echo "Name must be longer than 3 Chars";
} else {
    echo "Question Name: $title <br>";
}

if(empty($body)){
    echo "Pls fill in with a comment";
} else if(strlen($body) > 501){
    echo "The limit is 500 Characters";
}else {
    echo "Question: $body <br>";
}

if(empty($qSkills)){
    echo "Pls fill in Skills";
} else{
    $skills = explode(",", $qSkills);
    if(count($skills) < 3){
        echo "There are not enough skills";
    } else{
        echo "Skills: ";
        foreach($skills as $value){
            echo $value." |";
        }
    }
}

add_question($title, $body, $qSkills);