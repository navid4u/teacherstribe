<?php
$id = $_GET['id'];

include("conn.php");
$query = "SELECT id, title, description, date, posted_by FROM posts WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    $title = $row['title'];
    $date = $row['date'];
    $description = $row['description'];
    $posted_by = $row['posted_by'];
?>

<table class="centered-table">
    <tr>
        <th><?php echo $title; ?></th>
    </tr>
    <tr>
        <td><?php echo $date; ?></td>
    </tr>
    <tr>
        <td><?php echo $description; ?></td>
    </tr>
    <tr>
        <td class="grey-text">This was posted by <?php echo $posted_by; ?></td>
    </tr>
</table>

<?php
} else {
    echo "No matching record found.";
}

mysqli_close($conn);
?>