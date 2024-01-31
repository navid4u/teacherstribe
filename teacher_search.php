<style>
  .borderless-table {
    border-collapse: collapse;
  }

  .padding {
    padding: 8px;
    text-align: left;
    box-sizing: border-box;
  }

  .title {
    font-weight: bold;
    white-space: nowrap;
    text-align: right;
    padding-right: 10px;
  }

  @media only screen and (max-width: 600px) {
    .borderless-table td {
      display: block;
    }

    .borderless-table td:first-child {
      text-align: center;
    }
  }
</style>

<?php
// Assuming you have a database connection established
include("conn.php");
// Fetch data from the ttep_teacher table based on $teachlang value
$teachlang = $_POST['teachlang'];
$query = "SELECT * FROM ttep_teacher WHERE teachlang = '$teachlang'";
$result = mysqli_query($conn, $query);
?>

<!-- HTML code -->
<table style="width: 80%; margin: 0 auto; border-collapse: collapse;">
  <thead>

  </thead>
  <tbody style="width: 95%; background-color: rgba(255, 110, 6, 0.25); padding: 10px; border-radius: 15px; transition: background-color 0.3s ease;">
    <?php if (mysqli_num_rows($result) === 0) {
      echo '<tr><td colspan="3">Unfortunately, no teacher has joined us with this specification. You can call +989395095856 to require for a new teacher.</td></tr>';
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        $imagePath = $row['image_path'];
        $expertise = $row['expertise'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $contact_number = $row['contact_number'];
        

        $name = $row['firstname'] . " " . $row['lastname'];
        $id = $row['id_ttep_teacher'];
        ?>
    <tr>
      <td><img src="../web_app/<?php echo $imagePath; ?>" alt="Teacher Image" style="width: 80px; height: 80px; border-radius: 50%; margin-left: 20px; margin-right: 20px"></td>
      <td></td>
      <td class="padding">
        <a class="register-button page-scroll" style="  margin-top: 20px;
"  id="info-link"><?php echo $name; ?></a>
        <p></p>
        <div id="info">
          <table class="borderless-table">
            <tr>
              <td class="title">First Name:</td>
              <td><?php echo $firstname; ?></td>
            </tr>
            <tr>
              <td class="title">Last Name:</td>
              <td><?php echo $lastname; ?></td>
            </tr>
            <tr>
              <td class="title">Expertise:</td>
              <td><?php echo $expertise; ?></td>
            </tr>
            <tr>
              <td class="title">Contact Information:</td>
              <td><?php echo $contact_number; ?></td>
            </tr>
            <tr>
              <td class="title">Web Page:</td>
              <td><?php echo $web_page; ?></td>
            </tr>
          </table>
        </div>
      </td>
    </tr>

    <?php
      }
    }
    ?>

  </tbody>
</table>