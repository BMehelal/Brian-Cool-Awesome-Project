<?php
require 'config.php';
require('extract_data_from_api.php');
require('append_json.php');
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
$apiKey = NASA_API_KEY;
$numOfRequests = isset($_GET['numOfImages']) ? (int)$_GET['numOfImages'] : 1;
$responseData = extract_data_from_api($apiKey, $numOfRequests);
append_to_json($responseData);






