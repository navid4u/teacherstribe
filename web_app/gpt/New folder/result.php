<!DOCTYPE html>
<html>
<head>
    <title>ChatGPT Result</title>
</head>
<body>
    <?php
    // Retrieve the reply from the URL parameter
    $reply = $_GET['reply'];

    // Display the reply
    echo "<h1>ChatGPT Response:</h1>";
    echo "<p>$reply</p>";
    ?>
</body>
</html>