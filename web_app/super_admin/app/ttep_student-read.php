<?php
require_once('config.php');
require_once('helpers.php');
require_once('config-tables-columns.php');

// Check existence of id parameter before processing further
$_GET["id_ttep_student"] = trim($_GET["id_ttep_student"]);
if(isset($_GET["id_ttep_student"]) && !empty($_GET["id_ttep_student"])){
    // Prepare a select statement
    $sql = "SELECT `ttep_student`.* 
            FROM `ttep_student` 
            WHERE `ttep_student`.`id_ttep_student` = ?
            GROUP BY `ttep_student`.`id_ttep_student`;";

    if($stmt = mysqli_prepare($link, $sql)){
        // Set parameters
        $param_id = trim($_GET["id_ttep_student"]);

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
									// print_r($tables_and_columns_names['ttep_student']["columns"]['ttep_teacher_username']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['ttep_teacher_username']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['ttep_teacher_username']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['ttep_teacher_username']) .'" target="_blank" class="uploaded_file" id="link_ttep_teacher_username">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>ttep_teacher_username*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["ttep_teacher_username"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['purpose']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['purpose']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['purpose']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['purpose']) .'" target="_blank" class="uploaded_file" id="link_purpose">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>purpose</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["purpose"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['time']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['time']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['time']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['time']) .'" target="_blank" class="uploaded_file" id="link_time">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>time</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["time"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['firstname']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['firstname']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['firstname']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['firstname']) .'" target="_blank" class="uploaded_file" id="link_firstname">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>firstname</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["firstname"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['lastname']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['lastname']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['lastname']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['lastname']) .'" target="_blank" class="uploaded_file" id="link_lastname">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>lastname</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["lastname"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['age']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['age']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['age']['is_file'];
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
									// print_r($tables_and_columns_names['ttep_student']["columns"]['needed_sessions']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['needed_sessions']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['needed_sessions']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['needed_sessions']) .'" target="_blank" class="uploaded_file" id="link_needed_sessions">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>needed_sessions</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["needed_sessions"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['extra_information']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['extra_information']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['extra_information']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['extra_information']) .'" target="_blank" class="uploaded_file" id="link_extra_information">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>extra_information</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["extra_information"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['start_date']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['start_date']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['start_date']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['start_date']) .'" target="_blank" class="uploaded_file" id="link_start_date">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>start_date</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["start_date"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['books']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['books']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['books']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['books']) .'" target="_blank" class="uploaded_file" id="link_books">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>books</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["books"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['extra1']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['extra1']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['extra1']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['extra1']) .'" target="_blank" class="uploaded_file" id="link_extra1">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>extra1</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["extra1"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['base_pay']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['base_pay']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['base_pay']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['base_pay']) .'" target="_blank" class="uploaded_file" id="link_base_pay">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>base_pay</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["base_pay"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['day']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['day']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['day']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['day']) .'" target="_blank" class="uploaded_file" id="link_day">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>day</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["day"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['extra2']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['extra2']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['extra2']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['extra2']) .'" target="_blank" class="uploaded_file" id="link_extra2">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>extra2</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["extra2"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['mobile_number']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['mobile_number']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['mobile_number']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['mobile_number']) .'" target="_blank" class="uploaded_file" id="link_mobile_number">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>mobile_number</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["mobile_number"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['email']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['email']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['email']['is_file'];
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
									// print_r($tables_and_columns_names['ttep_student']["columns"]['active']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['active']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['active']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['active']) .'" target="_blank" class="uploaded_file" id="link_active">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>active</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["active"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['st_username']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['st_username']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['st_username']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['st_username']) .'" target="_blank" class="uploaded_file" id="link_st_username">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>st_username</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["st_username"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['st_password']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['st_password']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['st_password']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['st_password']) .'" target="_blank" class="uploaded_file" id="link_st_password">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>st_password</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["st_password"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['material']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['material']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['material']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['material']) .'" target="_blank" class="uploaded_file" id="link_material">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>material</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["material"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['link1']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['link1']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['link1']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['link1']) .'" target="_blank" class="uploaded_file" id="link_link1">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>link1</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["link1"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['link2']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['link2']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['link2']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['link2']) .'" target="_blank" class="uploaded_file" id="link_link2">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>link2</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["link2"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['link3']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['link3']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['link3']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['link3']) .'" target="_blank" class="uploaded_file" id="link_link3">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>link3</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["link3"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['link4']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['link4']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['link4']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['link4']) .'" target="_blank" class="uploaded_file" id="link_link4">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>link4</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["link4"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['focus1']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['focus1']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['focus1']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['focus1']) .'" target="_blank" class="uploaded_file" id="link_focus1">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>focus1</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["focus1"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['focus2']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['focus2']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['focus2']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['focus2']) .'" target="_blank" class="uploaded_file" id="link_focus2">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>focus2</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["focus2"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_student']["columns"]['focus3']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['focus3']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_student']["columns"]['focus3']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['focus3']) .'" target="_blank" class="uploaded_file" id="link_focus3">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>focus3</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["focus3"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>
                    <hr>
                    <p>
                        <a href="ttep_student-update.php?id_ttep_student=<?php echo $_GET["id_ttep_student"];?>" class="btn btn-warning"><?php translate('Update Record') ?></a>
                        <a href="ttep_student-delete.php?id_ttep_student=<?php echo $_GET["id_ttep_student"];?>" class="btn btn-danger"><?php translate('Delete Record') ?></a>
                        <a href="ttep_student-create.php" class="btn btn-success"><?php translate('Add New Record') ?></a>
                        <a href="ttep_student-index.php" class="btn btn-primary"><?php translate('Back to List') ?></a>
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