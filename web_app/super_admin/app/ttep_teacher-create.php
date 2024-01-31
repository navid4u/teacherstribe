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

        $firstname = trim($_POST["firstname"]);
		$lastname = trim($_POST["lastname"]);
		$age = $_POST["age"] == "" ? null : trim($_POST["age"]);
		$expertise = $_POST["expertise"] == "" ? null : trim($_POST["expertise"]);
		$email = $_POST["email"] == "" ? null : trim($_POST["email"]);
		$city = $_POST["city"] == "" ? null : trim($_POST["city"]);
		$address_country = $_POST["address_country"] == "" ? null : trim($_POST["address_country"]);
		$address_address = $_POST["address_address"] == "" ? null : trim($_POST["address_address"]);
		$signiture = $_POST["signiture"] == "" ? null : trim($_POST["signiture"]);
		$username = trim($_POST["username"]);
		$website = $_POST["website"] == "" ? null : trim($_POST["website"]);
		$contact_number = $_POST["contact_number"] == "" ? null : trim($_POST["contact_number"]);
		$id_ttep_community = $_POST["id_ttep_community"] == "" ? null : trim($_POST["id_ttep_community"]);
		$gender = $_POST["gender"] == "" ? null : trim($_POST["gender"]);
		$password = trim($_POST["password"]);
		$image_path = $_POST["image_path"] == "" ? null : trim($_POST["image_path"]);
		$nativelang = $_POST["nativelang"] == "" ? null : trim($_POST["nativelang"]);
		$teachlang = $_POST["teachlang"] == "" ? null : trim($_POST["teachlang"]);
		$status = $_POST["status"] == "" ? null : trim($_POST["status"]);
		$days_left = $_POST["days_left"] == "" ? null : trim($_POST["days_left"]);
		$sitetitle = $_POST["sitetitle"] == "" ? null : trim($_POST["sitetitle"]);
		$about_me = $_POST["about_me"] == "" ? null : trim($_POST["about_me"]);
		$duration = $_POST["duration"] == "" ? null : trim($_POST["duration"]);
		$hobby = $_POST["hobby"] == "" ? null : trim($_POST["hobby"]);
		$interest_1 = $_POST["interest_1"] == "" ? null : trim($_POST["interest_1"]);
		$interest_2 = $_POST["interest_2"] == "" ? null : trim($_POST["interest_2"]);
		$born = $_POST["born"] == "" ? null : trim($_POST["born"]);
		$instagram = $_POST["instagram"] == "" ? null : trim($_POST["instagram"]);
		$linkedin = $_POST["linkedin"] == "" ? null : trim($_POST["linkedin"]);
		$facebook = $_POST["facebook"] == "" ? null : trim($_POST["facebook"]);
		$twitter = $_POST["twitter"] == "" ? null : trim($_POST["twitter"]);
		$skill_1 = $_POST["skill_1"] == "" ? null : trim($_POST["skill_1"]);
		$skill_2 = $_POST["skill_2"] == "" ? null : trim($_POST["skill_2"]);
		$skill_3 = $_POST["skill_3"] == "" ? null : trim($_POST["skill_3"]);
		$currency = $_POST["currency"] == "" ? null : trim($_POST["currency"]);
		$create_date = $_POST["create_date"] == "" ? null : trim($_POST["create_date"]);
		


        $stmt = $link->prepare("INSERT INTO `ttep_teacher` (`firstname`, `lastname`, `age`, `expertise`, `email`, `city`, `address_country`, `address_address`, `signiture`, `username`, `website`, `contact_number`, `id_ttep_community`, `gender`, `password`, `image_path`, `nativelang`, `teachlang`, `status`, `days_left`, `sitetitle`, `about_me`, `duration`, `hobby`, `interest_1`, `interest_2`, `born`, `instagram`, `linkedin`, `facebook`, `twitter`, `skill_1`, `skill_2`, `skill_3`, `currency`, `create_date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        try {
            $stmt->execute([ $firstname, $lastname, $age, $expertise, $email, $city, $address_country, $address_address, $signiture, $username, $website, $contact_number, $id_ttep_community, $gender, $password, $image_path, $nativelang, $teachlang, $status, $days_left, $sitetitle, $about_me, $duration, $hobby, $interest_1, $interest_2, $born, $instagram, $linkedin, $facebook, $twitter, $skill_1, $skill_2, $skill_3, $currency, $create_date ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $error = $e->getMessage();
        }

        if (!isset($error)){
            $new_id = mysqli_insert_id($link);
            header("location: ttep_teacher-read.php?id_ttep_teacher=$new_id");
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
                                            <label for="firstname">firstname*</label>
                                            <input type="text" name="firstname" id="firstname" maxlength="45" class="form-control" value="<?php echo @$firstname; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="lastname">lastname*</label>
                                            <input type="text" name="lastname" id="lastname" maxlength="45" class="form-control" value="<?php echo @$lastname; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="age">age</label>
                                            <input type="number" name="age" id="age" class="form-control" value="<?php echo @$age; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="expertise">expertise</label>
                                            <textarea name="expertise" id="expertise" class="form-control"><?php echo @$expertise; ?></textarea>
                                        </div>
						<div class="form-group">
                                            <label for="email">email</label>
                                            <input type="text" name="email" id="email" maxlength="100" class="form-control" value="<?php echo @$email; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="city">city</label>
                                            <input type="text" name="city" id="city" maxlength="45" class="form-control" value="<?php echo @$city; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="address_country">address_country</label>
                                            <input type="text" name="address_country" id="address_country" maxlength="45" class="form-control" value="<?php echo @$address_country; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="address_address">address_address</label>
                                            <textarea name="address_address" id="address_address" class="form-control"><?php echo @$address_address; ?></textarea>
                                        </div>
						<div class="form-group">
                                            <label for="signiture">signiture</label>
                                            <input type="text" name="signiture" id="signiture" maxlength="45" class="form-control" value="<?php echo @$signiture; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="username">username*</label>
                                            <input type="text" name="username" id="username" maxlength="45" class="form-control" value="<?php echo @$username; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="website">website</label>
                                            <input type="text" name="website" id="website" maxlength="45" class="form-control" value="<?php echo @$website; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="contact_number">contact_number</label>
                                            <input type="text" name="contact_number" id="contact_number" maxlength="45" class="form-control" value="<?php echo @$contact_number; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="id_ttep_community">id_ttep_community</label>
                                            <input type="number" name="id_ttep_community" id="id_ttep_community" class="form-control" value="<?php echo @$id_ttep_community; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="gender">gender</label>
                                            <input type="text" name="gender" id="gender" maxlength="45" class="form-control" value="<?php echo @$gender; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="password">password*</label>
                                            <input type="text" name="password" id="password" maxlength="45" class="form-control" value="<?php echo @$password; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="image_path">image_path</label>
                                            
<input type="file" name="image_path" id="image_path" class="form-control">
<input type="hidden" name="cruddiy_backup_image_path" id="cruddiy_backup_image_path" value="<?php echo @$image_path; ?>">
<?php if (isset($image_path) && !empty($image_path)) : ?>
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="cruddiy_delete_image_path" name="cruddiy_delete_image_path" value="1">
    <label class="custom-control-label" for="cruddiy_delete_image_path">
<?php translate("Delete:") ?>: <a href="uploads/<?php echo $image_path ?>" target="_blank"><?php echo $image_path ?></a>    </label>
</div>
<?php endif ?>

                                        </div>
						<div class="form-group">
                                            <label for="nativelang">nativelang</label>
                                            <input type="text" name="nativelang" id="nativelang" maxlength="45" class="form-control" value="<?php echo @$nativelang; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="teachlang">teachlang</label>
                                            <input type="text" name="teachlang" id="teachlang" maxlength="45" class="form-control" value="<?php echo @$teachlang; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="status">status</label>
                                            <textarea name="status" id="status" class="form-control"><?php echo @$status; ?></textarea>
                                        </div>
						<div class="form-group">
                                            <label for="days_left">days_left</label>
                                            <input type="text" name="days_left" id="days_left" maxlength="45" class="form-control" value="<?php echo @$days_left; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="sitetitle">sitetitle</label>
                                            <input type="text" name="sitetitle" id="sitetitle" maxlength="100" class="form-control" value="<?php echo @$sitetitle; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="about_me">about_me</label>
                                            <textarea name="about_me" id="about_me" class="form-control"><?php echo @$about_me; ?></textarea>
                                        </div>
						<div class="form-group">
                                            <label for="duration">duration</label>
                                            <input type="text" name="duration" id="duration" maxlength="45" class="form-control" value="<?php echo @$duration; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="hobby">hobby</label>
                                            <textarea name="hobby" id="hobby" class="form-control"><?php echo @$hobby; ?></textarea>
                                        </div>
						<div class="form-group">
                                            <label for="interest_1">interest_1</label>
                                            <input type="text" name="interest_1" id="interest_1" maxlength="100" class="form-control" value="<?php echo @$interest_1; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="interest_2">interest_2</label>
                                            <input type="text" name="interest_2" id="interest_2" maxlength="100" class="form-control" value="<?php echo @$interest_2; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="born">born</label>
                                            <input type="text" name="born" id="born" maxlength="45" class="form-control" value="<?php echo @$born; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="instagram">instagram</label>
                                            <input type="text" name="instagram" id="instagram" maxlength="255" class="form-control" value="<?php echo @$instagram; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="linkedin">linkedin</label>
                                            <input type="text" name="linkedin" id="linkedin" maxlength="255" class="form-control" value="<?php echo @$linkedin; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="facebook">facebook</label>
                                            <input type="text" name="facebook" id="facebook" maxlength="255" class="form-control" value="<?php echo @$facebook; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="twitter">twitter</label>
                                            <input type="text" name="twitter" id="twitter" maxlength="255" class="form-control" value="<?php echo @$twitter; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="skill_1">skill_1</label>
                                            <input type="text" name="skill_1" id="skill_1" maxlength="255" class="form-control" value="<?php echo @$skill_1; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="skill_2">skill_2</label>
                                            <input type="text" name="skill_2" id="skill_2" maxlength="255" class="form-control" value="<?php echo @$skill_2; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="skill_3">skill_3</label>
                                            <input type="text" name="skill_3" id="skill_3" maxlength="255" class="form-control" value="<?php echo @$skill_3; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="currency">currency</label>
                                            <input type="text" name="currency" id="currency" maxlength="100" class="form-control" value="<?php echo @$currency; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="create_date">create_date</label>
                                            <input type="text" name="create_date" id="create_date" class="form-control" value="<?php echo @$create_date; ?>">
                                        </div>

                        <input type="submit" class="btn btn-primary" value="<?php translate('Create') ?>">
                        <a href="ttep_teacher-index.php" class="btn btn-secondary"><?php translate('Cancel') ?></a>
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