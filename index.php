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

$temp = explode(" ", $message);

if (count($temp) === 1) {
    $response = [
        "type" => "text",
        "text" => $message,
        "media" => null,
    ];

    echo json_encode($response);
    exit;
}

$repeatNumber = $temp[0];

if(!is_numeric($repeatNumber)){
    $response = [
        "type" => "text",
        "text" => $message,
        "media" => null,
    ];

    echo json_encode($response);
    exit;
}

$repeatNumber = (int) $repeatNumber;
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