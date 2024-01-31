
    <div id="news" class="text-center">
      <div class="container">
        <div class="section-title center">
          <h2>Latest News</h2>
          <hr />
          <p>
           Here you will find the latest news, up-to-dates and announcements
          </p>
        </div>
        <div id="row">
        

        <div class="blog-grid">
        <?php
// Assuming you have already established a database connection
        include("conn.php");
// Query the database to fetch the blog post information
$query = "SELECT id, title, description, date FROM posts WHERE posted_by = 'navid' LIMIT 6";
$result = mysqli_query($conn, $query);

// Check if any posts were found
if (mysqli_num_rows($result) > 0) {
    // Loop through each row in the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Extract the values from the row
        $id = $row['id'];
        $title = $row['title'];
        $date = $row['date'];
        $description = $row['description'];
    $description = strip_tags($description);

        // Truncate the description to 50 words
        $truncatedDescription = implode(' ', array_slice(str_word_count($description, 1), 0, 30));

        // Generate the HTML code for the blog post
        echo '<div class="blog-post">';
        echo '<h2 class="blog-title">' . $title . '</h2>';
        echo '<p class="blog-date">' . $date . '</p>';
        echo '<p class="blog-body">' . $truncatedDescription . ' ...</p>';
        echo '<p><a href="blog_post.php?id=' . $id . '" class="new-button">Read more</a></p>';
        echo '</div>';
    }
}
?>
  </div>
</div>




            </div>
          </div>
        </div>
      </div>
    </div>