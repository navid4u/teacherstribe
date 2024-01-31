<?php require_once('config-tables-columns.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand nav-link" href="index.php">app</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php translate('Select Page') ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a href="events-index.php" class="dropdown-item">Calendar  Events</a> 
	
        	<a class="dropdown-item" href="posts-index.php"><?php echo (!empty($tables_and_columns_names["posts"]["name"])) ? $tables_and_columns_names["posts"]["name"] : "posts" ?></a>
		<a class="dropdown-item" href="ttep_announcement-index.php"><?php echo (!empty($tables_and_columns_names["ttep_announcement"]["name"])) ? $tables_and_columns_names["ttep_announcement"]["name"] : "ttep_announcement" ?></a>
		<a class="dropdown-item" href="ttep_messages-index.php"><?php echo (!empty($tables_and_columns_names["ttep_messages"]["name"])) ? $tables_and_columns_names["ttep_messages"]["name"] : "ttep_messages" ?></a>
		<a class="dropdown-item" href="ttep_premium-index.php"><?php echo (!empty($tables_and_columns_names["ttep_premium"]["name"])) ? $tables_and_columns_names["ttep_premium"]["name"] : "ttep_premium" ?></a>
		<a class="dropdown-item" href="ttep_project-index.php"><?php echo (!empty($tables_and_columns_names["ttep_project"]["name"])) ? $tables_and_columns_names["ttep_project"]["name"] : "ttep_project" ?></a>
		<a class="dropdown-item" href="ttep_reminder-index.php"><?php echo (!empty($tables_and_columns_names["ttep_reminder"]["name"])) ? $tables_and_columns_names["ttep_reminder"]["name"] : "ttep_reminder" ?></a>
		<a class="dropdown-item" href="ttep_session-index.php"><?php echo (!empty($tables_and_columns_names["ttep_session"]["name"])) ? $tables_and_columns_names["ttep_session"]["name"] : "ttep_session" ?></a>
		<a class="dropdown-item" href="ttep_student-index.php"><?php echo (!empty($tables_and_columns_names["ttep_student"]["name"])) ? $tables_and_columns_names["ttep_student"]["name"] : "ttep_student" ?></a>
		<a class="dropdown-item" href="ttep_teacher-index.php"><?php echo (!empty($tables_and_columns_names["ttep_teacher"]["name"])) ? $tables_and_columns_names["ttep_teacher"]["name"] : "ttep_teacher" ?></a>
		<a class="dropdown-item" href="ttep_time-index.php"><?php echo (!empty($tables_and_columns_names["ttep_time"]["name"])) ? $tables_and_columns_names["ttep_time"]["name"] : "ttep_time" ?></a>
		<a class="dropdown-item" href="ttep_tuition-index.php"><?php echo (!empty($tables_and_columns_names["ttep_tuition"]["name"])) ? $tables_and_columns_names["ttep_tuition"]["name"] : "ttep_tuition" ?></a>
	<!-- TABLE_BUTTONS -->
        </div>
      </li>
    </ul>
  </div>
</nav>