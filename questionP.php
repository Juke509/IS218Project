<?php
$qName = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
$qBody = filter_input(INPUT_POST, 'questionBdy', FILTER_DEFAULT);
$qSkills = filter_input(INPUT_POST, 'skills', FILTER_DEFAULT);

if(empty($qName)){
    echo "Pls fill in Name";
} else  if(strlen($qName) < 4){
    echo "Name must be longer than 3 Chars";
} else {
    echo "Question Name: $qName <br>";
}

if(empty($qBody)){
    echo "Pls fill in with a comment";
} else if(strlen($qBody) > 501){
    echo "The limit is 500 Characters";
}else {
    echo "Question: $qBody <br>";
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