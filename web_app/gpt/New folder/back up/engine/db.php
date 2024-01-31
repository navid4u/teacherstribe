<link rel="stylesheet" href="../style/style.css">
<head><title>TTEP Lesson plans</title></head>
<?php
if(isset($_POST['str'])){
$ch = curl_init();
$str = $_POST['str'];
// set the api...
curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$postdata = array("model" => "text-davinci-003",
"prompt" => $str,
"temperature" => 0.4,
"max_tokens" => 1500,
"top_p" => 1,
"frequency_penalty" => 0,
"presence_penalty" => 0);
$postdata = json_encode($postdata);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
// set headers...
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer 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';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// echo error...
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo "<p id='textbot'>";
    echo 'Error: ' . curl_error($ch);
    echo "</p>";
}
curl_close($ch);
// decode...
$result = json_decode($result, true);
// echo ~> if (200)
echo "<p id='textbot'>";
echo "                    <div class='text-center my-auto copyright'><span>Copyright © TTEP 2023.   </span></div>
" . $result['choices'][0]['text'];
echo "</p>";
echo "<a id='back' href='../'>Back</a>";
 
}
?>

 