<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>TTEP Free discussion questions</title>
  <link rel="stylesheet" href="../../style/style.css">

  <style>
    body {
      background-image: url("/web_app/assets/img/2.jpg");
       background-repeat: no-repeat; /
      font-family: Arial, sans-serif;
      margin: 20;
      padding: 20;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .card {
      background-color: #ffffff;
      opacity: 0.5;
       border-radius: 30px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 30px;
      width: 60%;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group select {
      width: 90%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      outline: none;
    }

    .form-group textarea {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      outline: none;
      resize: vertical;
    }

    .btn {
      background-color: #007bff;
      border: none;
      color: #ffffff;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .radio-group {
      display: flex;
      flex-wrap: wrap;
    }

    .radio-group input[type="radio"],
    .radio-group label {
      width: 15%;
    }

    .radio-group label {
      display: block;
    }
  </style>
</head>
<body>

  <div class="card">
  <p>
 
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ch = curl_init();



$listbox1Value = $_POST['listbox1'];
$listbox2Value = $_POST['listbox2'];
$radioValue = $_POST['radio'];
$textbox1Value = $_POST['textbox1'];
$textbox2Value = $_POST['textbox2'];
$textbox3Value = $_POST['textbox3'];
$textbox4Value = $_POST['textbox4'];

$str = $listbox1Value . $listbox2Value . $radioValue . $textbox1Value . $textbox2Value . $textbox3Value . $textbox4Value;

 // set the api...
curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$postdata = array("model" => "text-davinci-003",
"prompt" => $str,
"temperature" => 0.1,
"max_tokens" => 1500,
"top_p" => 0.2,
"frequency_penalty" => 0,
"presence_penalty" => 1);
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
echo   $result['choices'][0]['text'];
echo "</p>";
echo "<a id='back' href='../'>Back</a>";
 
}
?>

 
<p>   <p> 
    <br>
</p>
</div>

<p>
  <br>
</p>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>


