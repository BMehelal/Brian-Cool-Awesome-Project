<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
    if (file_exists("database.json")) {
        $fileContents = file_get_contents("database.json");
        echo $fileContents;
    
}

