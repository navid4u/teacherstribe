<?php
require_once('config.php');
require_once('helpers.php');
require_once('config-tables-columns.php');

// Check existence of id parameter before processing further
$_GET["id_ttep_projects"] = trim($_GET["id_ttep_projects"]);
if(isset($_GET["id_ttep_projects"]) && !empty($_GET["id_ttep_projects"])){
    // Prepare a select statement
    $sql = "SELECT `ttep_project`.* 
            FROM `ttep_project` 
            WHERE `ttep_project`.`id_ttep_projects` = ?
            GROUP BY `ttep_project`.`id_ttep_projects`;";

    if($stmt = mysqli_prepare($link, $sql)){
        // Set parameters
        $param_id = trim($_GET["id_ttep_projects"]);

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
									// print_r($tables_and_columns_names['ttep_project']["columns"]['title']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_project']["columns"]['title']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_project']["columns"]['title']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['title']) .'" target="_blank" class="uploaded_file" id="link_title">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>title</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo nl2br(htmlspecialchars($row["title"] ?? "")); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_project']["columns"]['detail']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_project']["columns"]['detail']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_project']["columns"]['detail']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['detail']) .'" target="_blank" class="uploaded_file" id="link_detail">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>detail</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo nl2br(htmlspecialchars($row["detail"] ?? "")); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_project']["columns"]['ttep_teacher_username']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_project']["columns"]['ttep_teacher_username']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_project']["columns"]['ttep_teacher_username']['is_file'];
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
									// print_r($tables_and_columns_names['ttep_project']["columns"]['time']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_project']["columns"]['time']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_project']["columns"]['time']['is_file'];
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
									// print_r($tables_and_columns_names['ttep_project']["columns"]['importance']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_project']["columns"]['importance']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_project']["columns"]['importance']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['importance']) .'" target="_blank" class="uploaded_file" id="link_importance">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>importance</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["importance"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_project']["columns"]['required']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_project']["columns"]['required']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_project']["columns"]['required']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['required']) .'" target="_blank" class="uploaded_file" id="link_required">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>required</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo nl2br(htmlspecialchars($row["required"] ?? "")); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_project']["columns"]['progress']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_project']["columns"]['progress']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_project']["columns"]['progress']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['progress']) .'" target="_blank" class="uploaded_file" id="link_progress">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>progress*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["progress"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_project']["columns"]['extra_information']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_project']["columns"]['extra_information']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_project']["columns"]['extra_information']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['extra_information']) .'" target="_blank" class="uploaded_file" id="link_extra_information">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>extra_information</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo nl2br(htmlspecialchars($row["extra_information"] ?? "")); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_project']["columns"]['short_long']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_project']["columns"]['short_long']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_project']["columns"]['short_long']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['short_long']) .'" target="_blank" class="uploaded_file" id="link_short_long">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>short_long</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["short_long"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>
                    <hr>
                    <p>
                        <a href="ttep_project-update.php?id_ttep_projects=<?php echo $_GET["id_ttep_projects"];?>" class="btn btn-warning"><?php translate('Update Record') ?></a>
                        <a href="ttep_project-delete.php?id_ttep_projects=<?php echo $_GET["id_ttep_projects"];?>" class="btn btn-danger"><?php translate('Delete Record') ?></a>
                        <a href="ttep_project-create.php" class="btn btn-success"><?php translate('Add New Record') ?></a>
                        <a href="ttep_project-index.php" class="btn btn-primary"><?php translate('Back to List') ?></a>
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