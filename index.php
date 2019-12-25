<?php

$question = $_GET['question'];

if(empty($question)){
    exit;
}

$response = [
    "type" => "text",
    "text" => strrev($question),
    "media" => null,
];

echo json_encode($response);