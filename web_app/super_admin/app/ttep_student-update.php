<?php
require_once('config.php');
require_once('helpers.php');
require_once('config-tables-columns.php');

// Processing form data when form is submitted
if(isset($_POST["id_ttep_student"]) && !empty($_POST["id_ttep_student"])){
    // Get hidden input value
    $id_ttep_student = $_POST["id_ttep_student"];

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

        $ttep_teacher_username = trim($_POST["ttep_teacher_username"]);
		$purpose = $_POST["purpose"] == "" ? null : trim($_POST["purpose"]);
		$time = $_POST["time"] == "" ? null : trim($_POST["time"]);
		$firstname = $_POST["firstname"] == "" ? null : trim($_POST["firstname"]);
		$lastname = $_POST["lastname"] == "" ? null : trim($_POST["lastname"]);
		$age = $_POST["age"] == "" ? null : trim($_POST["age"]);
		$needed_sessions = $_POST["needed_sessions"] == "" ? null : trim($_POST["needed_sessions"]);
		$extra_information = $_POST["extra_information"] == "" ? null : trim($_POST["extra_information"]);
		$start_date = $_POST["start_date"] == "" ? null : trim($_POST["start_date"]);
		$books = $_POST["books"] == "" ? null : trim($_POST["books"]);
		$extra1 = $_POST["extra1"] == "" ? null : trim($_POST["extra1"]);
		$base_pay = $_POST["base_pay"] == "" ? null : trim($_POST["base_pay"]);
		$day = $_POST["day"] == "" ? null : trim($_POST["day"]);
		$extra2 = $_POST["extra2"] == "" ? null : trim($_POST["extra2"]);
		$mobile_number = $_POST["mobile_number"] == "" ? null : trim($_POST["mobile_number"]);
		$email = $_POST["email"] == "" ? null : trim($_POST["email"]);
		$active = $_POST["active"] == "" ? null : trim($_POST["active"]);
		$st_username = $_POST["st_username"] == "" ? null : trim($_POST["st_username"]);
		$st_password = $_POST["st_password"] == "" ? null : trim($_POST["st_password"]);
		$material = $_POST["material"] == "" ? null : trim($_POST["material"]);
		$link1 = $_POST["link1"] == "" ? null : trim($_POST["link1"]);
		$link2 = $_POST["link2"] == "" ? null : trim($_POST["link2"]);
		$link3 = $_POST["link3"] == "" ? null : trim($_POST["link3"]);
		$link4 = $_POST["link4"] == "" ? null : trim($_POST["link4"]);
		$focus1 = $_POST["focus1"] == "" ? null : trim($_POST["focus1"]);
		$focus2 = $_POST["focus2"] == "" ? null : trim($_POST["focus2"]);
		$focus3 = $_POST["focus3"] == "" ? null : trim($_POST["focus3"]);
		

        // Prepare an update statement

        $stmt = $link->prepare("UPDATE `ttep_student` SET `ttep_teacher_username`=?,`purpose`=?,`time`=?,`firstname`=?,`lastname`=?,`age`=?,`needed_sessions`=?,`extra_information`=?,`start_date`=?,`books`=?,`extra1`=?,`base_pay`=?,`day`=?,`extra2`=?,`mobile_number`=?,`email`=?,`active`=?,`st_username`=?,`st_password`=?,`material`=?,`link1`=?,`link2`=?,`link3`=?,`link4`=?,`focus1`=?,`focus2`=?,`focus3`=? WHERE `id_ttep_student`=?");

        try {
            $stmt->execute([ $ttep_teacher_username, $purpose, $time, $firstname, $lastname, $age, $needed_sessions, $extra_information, $start_date, $books, $extra1, $base_pay, $day, $extra2, $mobile_number, $email, $active, $st_username, $st_password, $material, $link1, $link2, $link3, $link4, $focus1, $focus2, $focus3, $id_ttep_student  ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $error = $e->getMessage();
        }

        if (!isset($error)){
            header("location: ttep_student-read.php?id_ttep_student=$id_ttep_student");
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
$_GET["id_ttep_student"] = trim($_GET["id_ttep_student"]);
if(isset($_GET["id_ttep_student"]) && !empty($_GET["id_ttep_student"])){
    // Get URL parameter
    $id_ttep_student =  trim($_GET["id_ttep_student"]);

    // Prepare a select statement
    $sql = "SELECT * FROM `ttep_student` WHERE `id_ttep_student` = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        // Set parameters
        $param_id = $id_ttep_student;

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
					$purpose = htmlspecialchars($row["purpose"] ?? "");
					$time = htmlspecialchars($row["time"] ?? "");
					$firstname = htmlspecialchars($row["firstname"] ?? "");
					$lastname = htmlspecialchars($row["lastname"] ?? "");
					$age = htmlspecialchars($row["age"] ?? "");
					$needed_sessions = htmlspecialchars($row["needed_sessions"] ?? "");
					$extra_information = htmlspecialchars($row["extra_information"] ?? "");
					$start_date = htmlspecialchars($row["start_date"] ?? "");
					$books = htmlspecialchars($row["books"] ?? "");
					$extra1 = htmlspecialchars($row["extra1"] ?? "");
					$base_pay = htmlspecialchars($row["base_pay"] ?? "");
					$day = htmlspecialchars($row["day"] ?? "");
					$extra2 = htmlspecialchars($row["extra2"] ?? "");
					$mobile_number = htmlspecialchars($row["mobile_number"] ?? "");
					$email = htmlspecialchars($row["email"] ?? "");
					$active = htmlspecialchars($row["active"] ?? "");
					$st_username = htmlspecialchars($row["st_username"] ?? "");
					$st_password = htmlspecialchars($row["st_password"] ?? "");
					$material = htmlspecialchars($row["material"] ?? "");
					$link1 = htmlspecialchars($row["link1"] ?? "");
					$link2 = htmlspecialchars($row["link2"] ?? "");
					$link3 = htmlspecialchars($row["link3"] ?? "");
					$link4 = htmlspecialchars($row["link4"] ?? "");
					$focus1 = htmlspecialchars($row["focus1"] ?? "");
					$focus2 = htmlspecialchars($row["focus2"] ?? "");
					$focus3 = htmlspecialchars($row["focus3"] ?? "");
					

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
                                            <label for="ttep_teacher_username">ttep_teacher_username*</label>
                                            <input type="text" name="ttep_teacher_username" id="ttep_teacher_username" maxlength="100" class="form-control" value="<?php echo @$ttep_teacher_username; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="purpose">purpose</label>
                                            <input type="text" name="purpose" id="purpose" maxlength="200" class="form-control" value="<?php echo @$purpose; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="time">time</label>
                                            <input type="text" name="time" id="time" maxlength="100" class="form-control" value="<?php echo @$time; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="firstname">firstname</label>
                                            <input type="text" name="firstname" id="firstname" maxlength="450" class="form-control" value="<?php echo @$firstname; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="lastname">lastname</label>
                                            <input type="text" name="lastname" id="lastname" maxlength="450" class="form-control" value="<?php echo @$lastname; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="age">age</label>
                                            <input type="text" name="age" id="age" maxlength="20" class="form-control" value="<?php echo @$age; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="needed_sessions">needed_sessions</label>
                                            <input type="text" name="needed_sessions" id="needed_sessions" maxlength="20" class="form-control" value="<?php echo @$needed_sessions; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="extra_information">extra_information</label>
                                            <input type="text" name="extra_information" id="extra_information" maxlength="450" class="form-control" value="<?php echo @$extra_information; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="start_date">start_date</label>
                                            <input type="text" name="start_date" id="start_date" maxlength="45" class="form-control" value="<?php echo @$start_date; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="books">books</label>
                                            <input type="text" name="books" id="books" maxlength="450" class="form-control" value="<?php echo @$books; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="extra1">extra1</label>
                                            <input type="text" name="extra1" id="extra1" maxlength="45" class="form-control" value="<?php echo @$extra1; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="base_pay">base_pay</label>
                                            <input type="text" name="base_pay" id="base_pay" maxlength="45" class="form-control" value="<?php echo @$base_pay; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="day">day</label>
                                            <input type="text" name="day" id="day" maxlength="450" class="form-control" value="<?php echo @$day; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="extra2">extra2</label>
                                            <input type="text" name="extra2" id="extra2" maxlength="45" class="form-control" value="<?php echo @$extra2; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="mobile_number">mobile_number</label>
                                            <input type="text" name="mobile_number" id="mobile_number" maxlength="45" class="form-control" value="<?php echo @$mobile_number; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="email">email</label>
                                            <input type="text" name="email" id="email" maxlength="100" class="form-control" value="<?php echo @$email; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="active">active</label>
                                            <input type="text" name="active" id="active" maxlength="20" class="form-control" value="<?php echo @$active; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="st_username">st_username</label>
                                            <input type="text" name="st_username" id="st_username" maxlength="100" class="form-control" value="<?php echo @$st_username; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="st_password">st_password</label>
                                            <input type="text" name="st_password" id="st_password" maxlength="45" class="form-control" value="<?php echo @$st_password; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="material">material</label>
                                            <input type="text" name="material" id="material" maxlength="800" class="form-control" value="<?php echo @$material; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="link1">link1</label>
                                            <input type="text" name="link1" id="link1" maxlength="450" class="form-control" value="<?php echo @$link1; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="link2">link2</label>
                                            <input type="text" name="link2" id="link2" maxlength="450" class="form-control" value="<?php echo @$link2; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="link3">link3</label>
                                            <input type="text" name="link3" id="link3" maxlength="450" class="form-control" value="<?php echo @$link3; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="link4">link4</label>
                                            <input type="text" name="link4" id="link4" maxlength="450" class="form-control" value="<?php echo @$link4; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="focus1">focus1</label>
                                            <input type="text" name="focus1" id="focus1" maxlength="450" class="form-control" value="<?php echo @$focus1; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="focus2">focus2</label>
                                            <input type="text" name="focus2" id="focus2" maxlength="450" class="form-control" value="<?php echo @$focus2; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="focus3">focus3</label>
                                            <input type="text" name="focus3" id="focus3" maxlength="450" class="form-control" value="<?php echo @$focus3; ?>">
                                        </div>

                        <input type="hidden" name="id_ttep_student" value="<?php echo $id_ttep_student; ?>"/>
                        <p>
                            <input type="submit" class="btn btn-primary" value="<?php translate('Edit') ?>">
                            <a href="javascript:history.back()" class="btn btn-secondary"><?php translate('Cancel') ?></a>
                        </p>
                        <hr>
                        <p>
                            <a href="ttep_student-read.php?id_ttep_student=<?php echo $_GET["id_ttep_student"];?>" class="btn btn-info"><?php translate('View Record') ?></a>
                            <a href="ttep_student-delete.php?id_ttep_student=<?php echo $_GET["id_ttep_student"];?>" class="btn btn-danger"><?php translate('Delete Record') ?></a>
                            <a href="ttep_student-index.php" class="btn btn-primary"><?php translate('Back to List') ?></a>
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