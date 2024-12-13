<?php
function append_to_json($data)
{
    if (file_exists("database.json")) {
        $fileContents = file_get_contents("database.json");
        $existingData = json_decode($fileContents, true);
        if (!is_array($existingData)) {
            $existingData = [];
        }
        $mergedData = array_merge($data, $existingData);
        file_put_contents("database.json", json_encode($mergedData), JSON_PRETTY_PRINT);
    }
}
