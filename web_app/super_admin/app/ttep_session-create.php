<?php
require_once('config.php');
require_once('helpers.php');

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Checking for upload fields
    $upload_results = array();
    if (!empty($_FILES)) {
        foreach ($_FILES as $key => $value) {
            // Check if the file was actually uploaded
            if ($value['error'] != UPLOAD_ERR_NO_FILE) {
                // echo "Field " . $key . " is a file upload.\n";
                $this_upload = handleFileUpload($_FILES[$key]);
                $upload_results[] = $this_upload;
                // Put the filename in the POST data to save it in DB
                if (!in_array(true, array_column($this_upload, 'error')) && !array_key_exists('error', $this_upload)) {
                    $_POST[$key] = $this_upload['success'];
                }
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

        $id_ttep_student = trim($_POST["id_ttep_student"]);
		$ttep_teacher_username = trim($_POST["ttep_teacher_username"]);
		$time = $_POST["time"] == "" ? null : trim($_POST["time"]);
		$location = $_POST["location"] == "" ? null : trim($_POST["location"]);
		$date = $_POST["date"] == "" ? null : trim($_POST["date"]);
		$assignment = $_POST["assignment"] == "" ? null : trim($_POST["assignment"]);
		$extra_information = $_POST["extra_information"] == "" ? null : trim($_POST["extra_information"]);
		$day = $_POST["day"] == "" ? null : trim($_POST["day"]);
		


        $stmt = $link->prepare("INSERT INTO `ttep_session` (`id_ttep_student`, `ttep_teacher_username`, `time`, `location`, `date`, `assignment`, `extra_information`, `day`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        try {
            $stmt->execute([ $id_ttep_student, $ttep_teacher_username, $time, $location, $date, $assignment, $extra_information, $day ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $error = $e->getMessage();
        }

        if (!isset($error)){
            $new_id = mysqli_insert_id($link);
            header("location: ttep_session-read.php?id_ttep_session=$new_id");
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php translate('Add New Record') ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<?php require_once('navbar.php'); ?>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2><?php translate('Add New Record') ?></h2>
                    </div>
                    <?php print_error_if_exists(@$upload_errors); ?>
                    <?php print_error_if_exists(@$error); ?>
                    <p><?php translate('add_new_record_instructions') ?></p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                                            <label for="id_ttep_student">id_ttep_student*</label>
                                            <input type="number" name="id_ttep_student" id="id_ttep_student" class="form-control" value="<?php echo @$id_ttep_student; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="ttep_teacher_username">ttep_teacher_username*</label>
                                            <input type="text" name="ttep_teacher_username" id="ttep_teacher_username" maxlength="100" class="form-control" value="<?php echo @$ttep_teacher_username; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="time">time</label>
                                            <input type="text" name="time" id="time" maxlength="450" class="form-control" value="<?php echo @$time; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="location">location</label>
                                            <input type="text" name="location" id="location" maxlength="70" class="form-control" value="<?php echo @$location; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="date">date</label>
                                            <input type="text" name="date" id="date" maxlength="45" class="form-control" value="<?php echo @$date; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="assignment">assignment</label>
                                            <input type="text" name="assignment" id="assignment" maxlength="650" class="form-control" value="<?php echo @$assignment; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="extra_information">extra_information</label>
                                            <input type="text" name="extra_information" id="extra_information" maxlength="450" class="form-control" value="<?php echo @$extra_information; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="day">day</label>
                                            <input type="text" name="day" id="day" maxlength="45" class="form-control" value="<?php echo @$day; ?>">
                                        </div>

                        <input type="submit" class="btn btn-primary" value="<?php translate('Create') ?>">
                        <a href="ttep_session-index.php" class="btn btn-secondary"><?php translate('Cancel') ?></a>
                    </form>
                    <p><small><?php translate('required_fiels_instructions') ?></small></p>
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