<?php

$question = $_GET['question'];

if (empty($question)) {
    exit;
}

if (substr($question, 0, 6) !== "print ") {
    exit;
}

$temp = explode("print ", $question);

if (empty($temp[1])) {
    exit;
}

$message = $temp[1];

$temp = explode(" ", $message, 2);

if(count($temp) === 1){
    $response = [
        "type" => "text",
        "text" => $temp[0],
        "media" => null,
    ];

    echo json_encode($response);
    exit;
}


$repeatNumber = (int)$temp[0];
$message = $temp[1];

if ($repeatNumber > 10) {
    $repeatNumber = 10;
}

$response = [
    "type" => "text",
    "text" => str_repeat($message . "\n", $repeatNumber),
    "media" => null,
];

echo json_encode($response);