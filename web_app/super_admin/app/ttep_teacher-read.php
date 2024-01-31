<?php
require_once('config.php');
require_once('helpers.php');
require_once('config-tables-columns.php');

// Check existence of id parameter before processing further
$_GET["id_ttep_teacher"] = trim($_GET["id_ttep_teacher"]);
if(isset($_GET["id_ttep_teacher"]) && !empty($_GET["id_ttep_teacher"])){
    // Prepare a select statement
    $sql = "SELECT `ttep_teacher`.* 
            FROM `ttep_teacher` 
            WHERE `ttep_teacher`.`id_ttep_teacher` = ?
            GROUP BY `ttep_teacher`.`id_ttep_teacher`;";

    if($stmt = mysqli_prepare($link, $sql)){
        // Set parameters
        $param_id = trim($_GET["id_ttep_teacher"]);

        // Bind variables to the prepared statement as parameters
		if (is_int($param_id)) $__vartype = "i";
		elseif (is_string($param_id)) $__vartype = "s";
		elseif (is_numeric($param_id)) $__vartype = "d";
		else $__vartype = "b"; // blob
        mysqli_stmt_bind_param($stmt, $__vartype, $param_id);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }

        } else{
            echo translate('stmt_error') . "<br>".$stmt->error;
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php translate('View Record') ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<?php require_once('navbar.php'); ?>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="page-header">
                        <h1><?php translate('View Record') ?></h1>
                    </div>

                    									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['firstname']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['firstname']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['firstname']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['firstname']) .'" target="_blank" class="uploaded_file" id="link_firstname">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>firstname*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["firstname"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['lastname']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['lastname']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['lastname']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['lastname']) .'" target="_blank" class="uploaded_file" id="link_lastname">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>lastname*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["lastname"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['age']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['age']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['age']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['age']) .'" target="_blank" class="uploaded_file" id="link_age">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>age</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["age"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['expertise']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['expertise']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['expertise']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['expertise']) .'" target="_blank" class="uploaded_file" id="link_expertise">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>expertise</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo nl2br(htmlspecialchars($row["expertise"] ?? "")); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['email']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['email']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['email']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['email']) .'" target="_blank" class="uploaded_file" id="link_email">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>email</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["email"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['city']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['city']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['city']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['city']) .'" target="_blank" class="uploaded_file" id="link_city">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>city</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["city"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['address_country']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['address_country']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['address_country']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['address_country']) .'" target="_blank" class="uploaded_file" id="link_address_country">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>address_country</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["address_country"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['address_address']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['address_address']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['address_address']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['address_address']) .'" target="_blank" class="uploaded_file" id="link_address_address">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>address_address</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo nl2br(htmlspecialchars($row["address_address"] ?? "")); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['signiture']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['signiture']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['signiture']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['signiture']) .'" target="_blank" class="uploaded_file" id="link_signiture">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>signiture</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["signiture"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['username']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['username']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['username']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['username']) .'" target="_blank" class="uploaded_file" id="link_username">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>username*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["username"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['website']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['website']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['website']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['website']) .'" target="_blank" class="uploaded_file" id="link_website">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>website</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["website"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['contact_number']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['contact_number']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['contact_number']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['contact_number']) .'" target="_blank" class="uploaded_file" id="link_contact_number">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>contact_number</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["contact_number"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['id_ttep_community']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['id_ttep_community']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['id_ttep_community']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['id_ttep_community']) .'" target="_blank" class="uploaded_file" id="link_id_ttep_community">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>id_ttep_community</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["id_ttep_community"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['gender']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['gender']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['gender']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['gender']) .'" target="_blank" class="uploaded_file" id="link_gender">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>gender</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["gender"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['password']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['password']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['password']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['password']) .'" target="_blank" class="uploaded_file" id="link_password">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>password*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["password"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['image_path']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['image_path']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['image_path']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['image_path']) .'" target="_blank" class="uploaded_file" id="link_image_path">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>image_path</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo nl2br(htmlspecialchars($row["image_path"] ?? "")); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['nativelang']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['nativelang']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['nativelang']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['nativelang']) .'" target="_blank" class="uploaded_file" id="link_nativelang">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>nativelang</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["nativelang"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['teachlang']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['teachlang']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['teachlang']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['teachlang']) .'" target="_blank" class="uploaded_file" id="link_teachlang">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>teachlang</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["teachlang"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['status']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['status']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['status']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['status']) .'" target="_blank" class="uploaded_file" id="link_status">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>status</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo nl2br(htmlspecialchars($row["status"] ?? "")); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['days_left']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['days_left']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['days_left']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['days_left']) .'" target="_blank" class="uploaded_file" id="link_days_left">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>days_left</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["days_left"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['sitetitle']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['sitetitle']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['sitetitle']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['sitetitle']) .'" target="_blank" class="uploaded_file" id="link_sitetitle">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>sitetitle</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["sitetitle"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['about_me']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['about_me']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['about_me']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['about_me']) .'" target="_blank" class="uploaded_file" id="link_about_me">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>about_me</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo nl2br(htmlspecialchars($row["about_me"] ?? "")); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['duration']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['duration']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['duration']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['duration']) .'" target="_blank" class="uploaded_file" id="link_duration">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>duration</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["duration"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['hobby']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['hobby']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['hobby']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['hobby']) .'" target="_blank" class="uploaded_file" id="link_hobby">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>hobby</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo nl2br(htmlspecialchars($row["hobby"] ?? "")); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['interest_1']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['interest_1']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['interest_1']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['interest_1']) .'" target="_blank" class="uploaded_file" id="link_interest_1">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>interest_1</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["interest_1"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['interest_2']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['interest_2']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['interest_2']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['interest_2']) .'" target="_blank" class="uploaded_file" id="link_interest_2">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>interest_2</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["interest_2"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['born']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['born']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['born']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['born']) .'" target="_blank" class="uploaded_file" id="link_born">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>born</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["born"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['instagram']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['instagram']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['instagram']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['instagram']) .'" target="_blank" class="uploaded_file" id="link_instagram">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>instagram</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["instagram"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['linkedin']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['linkedin']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['linkedin']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['linkedin']) .'" target="_blank" class="uploaded_file" id="link_linkedin">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>linkedin</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["linkedin"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['facebook']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['facebook']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['facebook']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['facebook']) .'" target="_blank" class="uploaded_file" id="link_facebook">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>facebook</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["facebook"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['twitter']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['twitter']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['twitter']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['twitter']) .'" target="_blank" class="uploaded_file" id="link_twitter">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>twitter</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["twitter"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['skill_1']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['skill_1']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['skill_1']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['skill_1']) .'" target="_blank" class="uploaded_file" id="link_skill_1">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>skill_1</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["skill_1"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['skill_2']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['skill_2']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['skill_2']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['skill_2']) .'" target="_blank" class="uploaded_file" id="link_skill_2">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>skill_2</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["skill_2"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['skill_3']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['skill_3']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['skill_3']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['skill_3']) .'" target="_blank" class="uploaded_file" id="link_skill_3">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>skill_3</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["skill_3"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['currency']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['currency']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['currency']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['currency']) .'" target="_blank" class="uploaded_file" id="link_currency">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>currency</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["currency"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_teacher']["columns"]['create_date']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['create_date']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['create_date']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['create_date']) .'" target="_blank" class="uploaded_file" id="link_create_date">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>create_date</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["create_date"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>
                    <hr>
                    <p>
                        <a href="ttep_teacher-update.php?id_ttep_teacher=<?php echo $_GET["id_ttep_teacher"];?>" class="btn btn-warning"><?php translate('Update Record') ?></a>
                        <a href="ttep_teacher-delete.php?id_ttep_teacher=<?php echo $_GET["id_ttep_teacher"];?>" class="btn btn-danger"><?php translate('Delete Record') ?></a>
                        <a href="ttep_teacher-create.php" class="btn btn-success"><?php translate('Add New Record') ?></a>
                        <a href="ttep_teacher-index.php" class="btn btn-primary"><?php translate('Back to List') ?></a>
                    </p>
                    <?php
                    

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>