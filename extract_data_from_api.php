<?php
function extract_data_from_api($apiKey, $numOfRequests)
{
    $startTimeStamp = strtotime('1995-06-16'); // start of api history 
    $endTime = time(); // current time
    $responseData = [];
    $ch = curl_init();
    for ($i = 0; $i < $numOfRequests; $i++) {
        $randomTime = mt_rand($startTimeStamp, $endTime); // Generate a random timestamp from this range
        $randomDate = date('Y-m-d', $randomTime); // format the random date

        $apiUrl = "https://api.nasa.gov/planetary/apod?api_key={$apiKey}&date={$randomDate}"; // url of the api
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo "cURL Error: " . curl_error($ch);
            continue;
        }
        $jsonResponse = json_decode($response, true);
        if (isset($jsonResponse['date'], $jsonResponse['hdurl'], $jsonResponse['title'])) {
            $responseData[] = [
                'date' => $jsonResponse['date'],
                'hdurl' => $jsonResponse['hdurl'],
                'title' => $jsonResponse['title']
            ];
        } else {
            echo "Invalid JSON response received.\n";
        }

    }
    curl_close($ch);
    return $responseData;
}