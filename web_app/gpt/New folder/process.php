<?php

// Retrieve the message from the form submission
$message = $_POST['message'];

// Make a request to ChatGPT API
$api_key = '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';
$url = 'https://api.openai.com/v1/engines/davinci/completions';
$data = array(
    'prompt' => $message,
    'max_tokens' => 100,
    'temperature' => 0.7,
    'top_p' => 1.0,
    'n' => 1,
    'stop' => ''
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $api_key
));
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$result = curl_exec($ch);

if ($result === false) {
    // Handle the error
    $error = curl_error($ch);
    curl_close($ch);
    echo "Error making API request: " . $error;
    exit();
}

$response = json_decode($result, true);

if (isset($response['error'])) {
    // Handle the API response error
    $error = $response['error']['message'];
    echo "API Error: " . $error;
    exit();
}

// Extract the reply from ChatGPT's response
$choices = $response['choices'][0]['text'];
$reply = str_replace('You:', '', $choices);

// Display the reply in a new PHP page
header("Location: result.php?reply=" . urlencode($reply));
exit();
?>