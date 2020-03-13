<?php

$question = $_GET['question'];

if(empty($question)){
    exit;
}

if(substr( $question, 0, 6 ) !== "print "){
    exit;
}

$temp = explode("print ", $question);

$response = [
    "type" => "text",
    "text" => $temp[1],
    "media" => null,
];

echo json_encode($response);