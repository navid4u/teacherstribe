<?php
require_once('config.php');
require_once('helpers.php');
require_once('config-tables-columns.php');

// Processing form data when form is submitted
if(isset($_POST["id_ttep_announcement"]) && !empty($_POST["id_ttep_announcement"])){
    // Get hidden input value
    $id_ttep_announcement = $_POST["id_ttep_announcement"];

    // Checking for upload fields
    $upload_results = array();
    $upload_errors = array();

    // Use the backup fields to look for submitted files, if any
    foreach ($_POST as $key => $value) {

        // Check for $_POST cruddiy_backup_xxx to determine $_FILES xxx
        // We don't loop through $_FILES directly to handle value backup more easily
        if (substr($key, 0, 15) === 'cruddiy_backup_') {
            $originalKey = substr($key, 15);
            // Check if a file was uploaded for this field
            if (isset($_FILES[$originalKey]) && $_FILES[$originalKey]['error'] == UPLOAD_ERR_OK) {
                // Handle the file upload
                $this_upload = handleFileUpload($_FILES[$originalKey]);
                $upload_results[] = $this_upload;

                // If the upload was successful, update $_POST
                if (!in_array(true, array_column($this_upload, 'error')) && !array_key_exists('error', $this_upload)) {
                    $_POST[$originalKey] = $this_upload['success'];

                    // And we can safely delete the previous file
                    unlink($upload_target_dir . $_POST['cruddiy_backup_' . $originalKey]);
                }
            } else {
                // No file uploaded, use the backup
                $_POST[$originalKey] = $value;
            }
        }


        // Check for cruddiy_delete_xxx and set corresponding $_POST['xxx'] to blank
        if (substr($key, 0, 15) === 'cruddiy_delete_') {
            $deleteKey = substr($key, 15);

            if (isset($_POST['cruddiy_delete_' . $deleteKey]) && $_POST['cruddiy_delete_' . $deleteKey]) {
                // Set the corresponding field to blank
                $_POST[$deleteKey] = '';

                // And we can safely delete the file
                @unlink($upload_target_dir . $_POST['cruddiy_backup_' . $deleteKey]);
            }
        }
    }

    $upload_errors = array();
    foreach ($upload_results as $result) {
        if (isset($result['error'])) {
            $upload_errors[] = $result['error'];
        }
    }

    // Check for regular fields
    if (!in_array(true, array_column($upload_results, 'error'))) {

        $ttep_teacher_username = $_POST["ttep_teacher_username"] == "" ? null : trim($_POST["ttep_teacher_username"]);
		$ttep_student_username = $_POST["ttep_student_username"] == "" ? null : trim($_POST["ttep_student_username"]);
		$description = $_POST["description"] == "" ? null : trim($_POST["description"]);
		$date = $_POST["date"] == "" ? null : trim($_POST["date"]);
		$title = $_POST["title"] == "" ? null : trim($_POST["title"]);
		$all_s = trim($_POST["all_s"]);
		

        // Prepare an update statement

        $stmt = $link->prepare("UPDATE `ttep_announcement` SET `ttep_teacher_username`=?,`ttep_student_username`=?,`description`=?,`date`=?,`title`=?,`all_s`=? WHERE `id_ttep_announcement`=?");

        try {
            $stmt->execute([ $ttep_teacher_username, $ttep_student_username, $description, $date, $title, $all_s, $id_ttep_announcement  ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $error = $e->getMessage();
        }

        if (!isset($error)){
            header("location: ttep_announcement-read.php?id_ttep_announcement=$id_ttep_announcement");
        } else {
            $uploaded_files = array();
            foreach ($upload_results as $result) {
                if (isset($result['success'])) {
                    // Delete the uploaded files if there were any error while saving postdata in DB
                    unlink($upload_target_dir . $result['success']);
                }
            }
        }

    }
}
// Check existence of id parameter before processing further
$_GET["id_ttep_announcement"] = trim($_GET["id_ttep_announcement"]);
if(isset($_GET["id_ttep_announcement"]) && !empty($_GET["id_ttep_announcement"])){
    // Get URL parameter
    $id_ttep_announcement =  trim($_GET["id_ttep_announcement"]);

    // Prepare a select statement
    $sql = "SELECT * FROM `ttep_announcement` WHERE `id_ttep_announcement` = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        // Set parameters
        $param_id = $id_ttep_announcement;

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

                // Retrieve individual field value

                $ttep_teacher_username = htmlspecialchars($row["ttep_teacher_username"] ?? "");
					$ttep_student_username = htmlspecialchars($row["ttep_student_username"] ?? "");
					$description = htmlspecialchars($row["description"] ?? "");
					$date = htmlspecialchars($row["date"] ?? "");
					$title = htmlspecialchars($row["title"] ?? "");
					$all_s = htmlspecialchars($row["all_s"] ?? "");
					

            } else{
                // URL doesn't contain valid id. Redirect to error page
                header("location: error.php");
                exit();
            }

        } else{
            translate('stmt_error') . "<br>".$stmt->error;
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

}  else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php translate('Update Record') ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<?php require_once('navbar.php'); ?>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2><?php translate('Update Record') ?></h2>
                    </div>
                    <?php print_error_if_exists(@$upload_errors); ?>
                    <?php print_error_if_exists(@$error); ?>
                    <p><?php translate('update_record_instructions') ?></p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                                            <label for="ttep_teacher_username">ttep_teacher_username</label>
                                            <input type="text" name="ttep_teacher_username" id="ttep_teacher_username" maxlength="45" class="form-control" value="<?php echo @$ttep_teacher_username; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="ttep_student_username">ttep_student_username</label>
                                            <input type="text" name="ttep_student_username" id="ttep_student_username" maxlength="45" class="form-control" value="<?php echo @$ttep_student_username; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="description">description</label>
                                            <textarea name="description" id="description" class="form-control"><?php echo @$description; ?></textarea>
                                        </div>
						<div class="form-group">
                                            <label for="date">date</label>
                                            <input type="text" name="date" id="date" maxlength="45" class="form-control" value="<?php echo @$date; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="title">title</label>
                                            <textarea name="title" id="title" class="form-control"><?php echo @$title; ?></textarea>
                                        </div>
						<div class="form-group">
                                            <label for="all_s">all_s*</label>
                                            <input type="text" name="all_s" id="all_s" maxlength="45" class="form-control" value="<?php echo @$all_s; ?>">
                                        </div>

                        <input type="hidden" name="id_ttep_announcement" value="<?php echo $id_ttep_announcement; ?>"/>
                        <p>
                            <input type="submit" class="btn btn-primary" value="<?php translate('Edit') ?>">
                            <a href="javascript:history.back()" class="btn btn-secondary"><?php translate('Cancel') ?></a>
                        </p>
                        <hr>
                        <p>
                            <a href="ttep_announcement-read.php?id_ttep_announcement=<?php echo $_GET["id_ttep_announcement"];?>" class="btn btn-info"><?php translate('View Record') ?></a>
                            <a href="ttep_announcement-delete.php?id_ttep_announcement=<?php echo $_GET["id_ttep_announcement"];?>" class="btn btn-danger"><?php translate('Delete Record') ?></a>
                            <a href="ttep_announcement-index.php" class="btn btn-primary"><?php translate('Back to List') ?></a>
                        </p>
                        <p><?php translate('required_fiels_instructions') ?></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
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