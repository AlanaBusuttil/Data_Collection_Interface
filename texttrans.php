<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Directory where text files will be stored
$directory = '/var/www/rival/public_html/simerr/text/';

// Create the directory if it doesn't exist
if (!file_exists($directory)) {
    mkdir($directory, 0777, true);
}

// Generate a unique filename using a timestamp
//$file = $directory . 'transcription_' . time() . '.txt';

// Get the POST data
$data = file_get_contents('php://input');

// Check if data is received
if ($data !== false) {
    // PHP
    $transcriptFile = isset(getallheaders()['X-Transcript-File']) ? getallheaders()['X-Transcript-File'] : 'blipbloop';
    // Generate a unique filename using the audio file name and timestamp
    $file = $directory . $transcriptFile;

    // Append the data to the text file
    $result = file_put_contents($file, $data);

    // Check if the write operation was successful
    if ($result !== false) {
        echo 'Text appended to ' . $file;
    } else {
        http_response_code(500); // Internal Server Error
        echo 'Error writing to file';
    }
} else {
    http_response_code(400); // Bad Request
    echo 'No data received';
}
?>
