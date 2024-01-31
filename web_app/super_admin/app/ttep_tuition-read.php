<?php
require_once('config.php');
require_once('helpers.php');
require_once('config-tables-columns.php');

// Check existence of id parameter before processing further
$_GET["id_ttep_payment"] = trim($_GET["id_ttep_payment"]);
if(isset($_GET["id_ttep_payment"]) && !empty($_GET["id_ttep_payment"])){
    // Prepare a select statement
    $sql = "SELECT `ttep_tuition`.* 
            FROM `ttep_tuition` 
            WHERE `ttep_tuition`.`id_ttep_payment` = ?
            GROUP BY `ttep_tuition`.`id_ttep_payment`;";

    if($stmt = mysqli_prepare($link, $sql)){
        // Set parameters
        $param_id = trim($_GET["id_ttep_payment"]);

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
									// print_r($tables_and_columns_names['ttep_tuition']["columns"]['ttep_teacher_username']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_tuition']["columns"]['ttep_teacher_username']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_tuition']["columns"]['ttep_teacher_username']['is_file'];
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
									// print_r($tables_and_columns_names['ttep_tuition']["columns"]['id_ttep_student']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_tuition']["columns"]['id_ttep_student']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_tuition']["columns"]['id_ttep_student']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['id_ttep_student']) .'" target="_blank" class="uploaded_file" id="link_id_ttep_student">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>id_ttep_student*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["id_ttep_student"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_tuition']["columns"]['date']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_tuition']["columns"]['date']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_tuition']["columns"]['date']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['date']) .'" target="_blank" class="uploaded_file" id="link_date">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>date*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo convert_date($row["date"]); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_tuition']["columns"]['extra_information']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_tuition']["columns"]['extra_information']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_tuition']["columns"]['extra_information']['is_file'];
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
									// print_r($tables_and_columns_names['ttep_tuition']["columns"]['amount']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_tuition']["columns"]['amount']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_tuition']["columns"]['amount']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['amount']) .'" target="_blank" class="uploaded_file" id="link_amount">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>amount*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["amount"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_tuition']["columns"]['image_path']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_tuition']["columns"]['image_path']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_tuition']["columns"]['image_path']['is_file'];
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
									// print_r($tables_and_columns_names['ttep_tuition']["columns"]['sessioncount']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_tuition']["columns"]['sessioncount']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_tuition']["columns"]['sessioncount']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['sessioncount']) .'" target="_blank" class="uploaded_file" id="link_sessioncount">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>sessioncount</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["sessioncount"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['ttep_tuition']["columns"]['reason']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['ttep_tuition']["columns"]['reason']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['ttep_tuition']["columns"]['reason']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['reason']) .'" target="_blank" class="uploaded_file" id="link_reason">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>reason</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["reason"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>
                    <hr>
                    <p>
                        <a href="ttep_tuition-update.php?id_ttep_payment=<?php echo $_GET["id_ttep_payment"];?>" class="btn btn-warning"><?php translate('Update Record') ?></a>
                        <a href="ttep_tuition-delete.php?id_ttep_payment=<?php echo $_GET["id_ttep_payment"];?>" class="btn btn-danger"><?php translate('Delete Record') ?></a>
                        <a href="ttep_tuition-create.php" class="btn btn-success"><?php translate('Add New Record') ?></a>
                        <a href="ttep_tuition-index.php" class="btn btn-primary"><?php translate('Back to List') ?></a>
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