<?php
require_once 'connect.php';
require_once 'header.php';
 
if (isset($_POST['submit'])) {
    
    $title = mysqli_real_escape_string($dbcon, $_POST['title']);
    $privacy = $_POST['privacy'];
    $description = mysqli_real_escape_string($dbcon, $_POST ['description']);
    $slug = slug($title);
    $date = date('Y-m-d H:i');
    $username = $_SESSION['username'];

    $sql = "INSERT INTO posts (title, description, slug, posted_by, date, privacy) VALUES('$title', '$description', '$slug', '$username', '$date', '$privacy')";
    mysqli_query($dbcon, $sql) or die("failed to post" . mysqli_connect_error());

    $permalink = "p/".mysqli_insert_id($dbcon) ."/".$slug;

    printf("Posted successfully. <meta http-equiv='refresh' content='2; url=%s'/>",
       $permalink);

} else {
    ?>
    <div class="w3-container">
        <div class="w3-card-4">
            <div class="w3-container w3-teal">
                <h2>New Post</h2>
            </div>

            <form class="w3-container" method="POST">

                <p>
                    <label>Title</label>
                    <input type="text" class="w3-input w3-border" name="title" required>
                </p>
                <p>

                    <label>Privacy</label>

<select name="privacy" id="privacy">
  <option value="site">Only on my Website</option>
  <option value="teacher">All other teachers (on the social part)</option>
  <option value="all" selected >On my Website and Other teachers (public)</option>
  <option value="private">Just me (private)</option>
</select>
                </p>


                <p>
                    <label>Description</label>
                    <textarea id = "description" row="30" cols="50" class="w3-input w3-border" name="description" required/></textarea>
                </p>
                <p>
                    <input type="submit" class="w3-btn w3-teal w3-round" name="submit" value="Post">
                </p>
            </form>

        </div>
    </div>
    <?php
}

include("footer.php");
