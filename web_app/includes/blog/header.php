<?php
require_once 'functions.php';
require_once 'config.php';

if (!empty(SITE_ROOT)){
    $url_path = "/".SITE_ROOT."/";
} else{
    $url_path = "/";
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" ,initial-scale=1">
 
    <link rel="stylesheet" type="text/css" href="/web_app/includes/blog/blog_css.css">

    <link rel="stylesheet" href="/web_app/includes/blog/blog_css_2.css">
</head>
<body>



<div class="w3-bar w3-border">
<?php echo "<a href='".$url_path ."index.php' class='w3-bar-item w3-btn'>Home</a>"; ?>
    <?php
         echo "<a href='".$url_path ."new.php' class='w3-bar-item w3-btn'>New Post</a>";
        echo "<a href='".$url_path ."admin.php' class='w3-bar-item w3-btn'>Admin Panel</a>";
     
    ?>
</div>

<div class="w3-container">
    <form action="<?=$url_path?>search.php" method="GET" class="w3-container">
        <p>
            <input type="text" name="q" class="w3-input w3-border" placeholder="Search for anything" required>
        </p>
        <p>
        <input type="submit" class="w3-btn w3-teal w3-round" value="Search">
        </p>
    </form>
</div>