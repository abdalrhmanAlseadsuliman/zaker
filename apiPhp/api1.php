<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: *");
// Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With

$data = ["name" => "Aboode","websiteName" => "test.com"];
$jsonData = json_encode($data);
print_r($jsonData);

$datafile = file_get_contents('php://input');
$datafiles = json_decode($datafile);

print_r($datafiles->userName);

?>