<?php

$question = $_GET['question'];

if(empty($question)){
    exit;
}

if(substr( $question, 0, 6 ) !== "print "){
    exit;
}

$temp = explode("print ", $question);

if(empty($temp[1])){
    exit;
}

$message = $temp[1];

$temp = explode(" ", $message);

$repeatNumber = (int) $temp[0];
$message = $temp[1];

$response = [
    "type" => "text",
    "text" => str_repeat($message."\n", $repeatNumber),
    "media" => null,
];

echo json_encode($response);