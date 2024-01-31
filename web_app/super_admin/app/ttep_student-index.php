<?php

require_once('config.php');
require_once('config-tables-columns.php');
require_once('helpers.php');

// Check if it's an export request
$isCsvExport = isset($_GET['export']) && $_GET['export'] == 'csv';


//Get current URL and parameters for correct pagination
$script   = $_SERVER['SCRIPT_NAME'];
$parameters   = $_GET ? $_SERVER['QUERY_STRING'] : "" ;
$currenturl = $domain. $script . '?' . $parameters;

//Pagination
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

//$no_of_records_per_page is set on the index page. Default is 10.
$offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM `ttep_student`";
$result = mysqli_query($link,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

//Column sorting on column name
$columns = array('id_ttep_student', 'ttep_teacher_username', 'purpose', 'time', 'firstname', 'lastname', 'age', 'needed_sessions', 'extra_information', 'start_date', 'books', 'extra1', 'base_pay', 'day', 'extra2', 'mobile_number', 'email', 'active', 'st_username', 'st_password', 'material', 'link1', 'link2', 'link3', 'link4', 'focus1', 'focus2', 'focus3');
// Order by primary key on default
$order = 'id_ttep_student';
if (isset($_GET['order']) && in_array($_GET['order'], $columns)) {
    $order = $_GET['order'];
}

//Column sort order
$sortBy = array('asc', 'desc'); $sort = 'asc';
if (isset($_GET['sort']) && in_array($_GET['sort'], $sortBy)) {
        if($_GET['sort']=='asc') {
        $sort='asc';
        }
else {
    $sort='desc';
    }
}

//Generate WHERE statements for param
$where_columns = array_intersect_key($_GET, array_flip($columns));
$get_param = "";
$where_statement = " WHERE 1=1 ";
foreach ( $where_columns as $key => $val ) {
    $where_statement .= " AND `$key` = '" . mysqli_real_escape_string($link, $val) . "' ";
    $get_param .= "&$key=$val";
}

if (!empty($_GET['search'])) {
    $search = mysqli_real_escape_string($link, $_GET['search']);
    if (strpos('`ttep_student`.`id_ttep_student`, `ttep_student`.`ttep_teacher_username`, `ttep_student`.`purpose`, `ttep_student`.`time`, `ttep_student`.`firstname`, `ttep_student`.`lastname`, `ttep_student`.`age`, `ttep_student`.`needed_sessions`, `ttep_student`.`extra_information`, `ttep_student`.`start_date`, `ttep_student`.`books`, `ttep_student`.`extra1`, `ttep_student`.`base_pay`, `ttep_student`.`day`, `ttep_student`.`extra2`, `ttep_student`.`mobile_number`, `ttep_student`.`email`, `ttep_student`.`active`, `ttep_student`.`st_username`, `ttep_student`.`st_password`, `ttep_student`.`material`, `ttep_student`.`link1`, `ttep_student`.`link2`, `ttep_student`.`link3`, `ttep_student`.`link4`, `ttep_student`.`focus1`, `ttep_student`.`focus2`, `ttep_student`.`focus3`', ',')) {
        $where_statement .= " AND CONCAT_WS (`ttep_student`.`id_ttep_student`, `ttep_student`.`ttep_teacher_username`, `ttep_student`.`purpose`, `ttep_student`.`time`, `ttep_student`.`firstname`, `ttep_student`.`lastname`, `ttep_student`.`age`, `ttep_student`.`needed_sessions`, `ttep_student`.`extra_information`, `ttep_student`.`start_date`, `ttep_student`.`books`, `ttep_student`.`extra1`, `ttep_student`.`base_pay`, `ttep_student`.`day`, `ttep_student`.`extra2`, `ttep_student`.`mobile_number`, `ttep_student`.`email`, `ttep_student`.`active`, `ttep_student`.`st_username`, `ttep_student`.`st_password`, `ttep_student`.`material`, `ttep_student`.`link1`, `ttep_student`.`link2`, `ttep_student`.`link3`, `ttep_student`.`link4`, `ttep_student`.`focus1`, `ttep_student`.`focus2`, `ttep_student`.`focus3`) LIKE '%$search%'";
    } else {
        $where_statement .= " AND `ttep_student`.`id_ttep_student`, `ttep_student`.`ttep_teacher_username`, `ttep_student`.`purpose`, `ttep_student`.`time`, `ttep_student`.`firstname`, `ttep_student`.`lastname`, `ttep_student`.`age`, `ttep_student`.`needed_sessions`, `ttep_student`.`extra_information`, `ttep_student`.`start_date`, `ttep_student`.`books`, `ttep_student`.`extra1`, `ttep_student`.`base_pay`, `ttep_student`.`day`, `ttep_student`.`extra2`, `ttep_student`.`mobile_number`, `ttep_student`.`email`, `ttep_student`.`active`, `ttep_student`.`st_username`, `ttep_student`.`st_password`, `ttep_student`.`material`, `ttep_student`.`link1`, `ttep_student`.`link2`, `ttep_student`.`link3`, `ttep_student`.`link4`, `ttep_student`.`focus1`, `ttep_student`.`focus2`, `ttep_student`.`focus3` LIKE '%$search%'";
    }

} else {
    $search = "";
}

$order_clause = !empty($order) ? "ORDER BY `$order` $sort" : '';
$group_clause = !empty($order) && $order == 'id_ttep_student' ? "GROUP BY `ttep_student`.`$order`" : '';

// Prepare SQL queries
$sql = "SELECT `ttep_student`.* 
        FROM `ttep_student` 
        $where_statement
        $group_clause
        $order_clause";

// Add pagination only if it's not a CSV export
if (!$isCsvExport) {
    $sql .= " LIMIT $offset, $no_of_records_per_page";
}

// Execute the main query
$result = mysqli_query($link, $sql);

// Stop further rendering for CSV export
if ($isCsvExport) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    exportAsCSV($data, $db_name, $tables_and_columns_names, 'ttep_student', $link, false);
    exit;
}

$count_pages = "SELECT COUNT(*) AS count
                FROM `ttep_student` 
                $where_statement";

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>app</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b773fe9e4.js" crossorigin="anonymous"></script>
    <style type="text/css">
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 5px;
        }
        body {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php require_once('navbar.php'); ?>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <?php
                        // Prevent crash if $str contains single quotes
                        $str = <<<'EOD'
                        Students' information
                        EOD;
                        ?>
                        <h2 class="float-left"><?php translate('%s Details', true, $str) ?></h2>
                        <a href="ttep_student-create.php" class="btn btn-success float-right"><?php translate('Add New Record') ?></a>
                        <a href="ttep_student-index.php" class="btn btn-info float-right mr-2"><?php translate('Reset View') ?></a>
                        <a href="ttep_student-index.php?export=csv" class="btn btn-primary float-right mr-2"><?php translate('Export as CSV') ?></a>
                        <a href="javascript:history.back()" class="btn btn-secondary float-right mr-2"><?php translate('Back') ?></a>
                    </div>

                    <div class="form-row">
                        <form action="ttep_student-index.php" method="get">
                            <div class="col"> <input type="text" class="form-control" placeholder="<?php translate('Search this table') ?>" name="search"></div>
                        </form>
                        <br>


                        <?php
                        if($result) :
                            if(mysqli_num_rows($result) > 0) :
                                $number_of_results = mysqli_fetch_assoc(mysqli_query($link, $count_pages))['count'];
                                $total_pages = ceil($number_of_results / $no_of_records_per_page);
                                translate('total_results', true, $number_of_results, $pageno, $total_pages);
                                ?>

                                <table class='table table-bordered table-striped'>
                                    <thead class='thead-light'>
                                        <tr>
                                            <?php 									$columnname = "id_ttep_student";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=id_ttep_student&sort=".$sort_link.">id_ttep_student</a></th>";
									$columnname = "ttep_teacher_username";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=ttep_teacher_username&sort=".$sort_link.">ttep_teacher_username</a></th>";
									$columnname = "purpose";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=purpose&sort=".$sort_link.">purpose</a></th>";
									$columnname = "time";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=time&sort=".$sort_link.">time</a></th>";
									$columnname = "firstname";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=firstname&sort=".$sort_link.">firstname</a></th>";
									$columnname = "lastname";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=lastname&sort=".$sort_link.">lastname</a></th>";
									$columnname = "age";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=age&sort=".$sort_link.">age</a></th>";
									$columnname = "needed_sessions";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=needed_sessions&sort=".$sort_link.">needed_sessions</a></th>";
									$columnname = "extra_information";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=extra_information&sort=".$sort_link.">extra_information</a></th>";
									$columnname = "start_date";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=start_date&sort=".$sort_link.">start_date</a></th>";
									$columnname = "books";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=books&sort=".$sort_link.">books</a></th>";
									$columnname = "extra1";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=extra1&sort=".$sort_link.">extra1</a></th>";
									$columnname = "base_pay";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=base_pay&sort=".$sort_link.">base_pay</a></th>";
									$columnname = "day";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=day&sort=".$sort_link.">day</a></th>";
									$columnname = "extra2";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=extra2&sort=".$sort_link.">extra2</a></th>";
									$columnname = "mobile_number";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=mobile_number&sort=".$sort_link.">mobile_number</a></th>";
									$columnname = "email";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=email&sort=".$sort_link.">email</a></th>";
									$columnname = "active";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=active&sort=".$sort_link.">active</a></th>";
									$columnname = "st_username";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=st_username&sort=".$sort_link.">st_username</a></th>";
									$columnname = "st_password";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=st_password&sort=".$sort_link.">st_password</a></th>";
									$columnname = "material";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=material&sort=".$sort_link.">material</a></th>";
									$columnname = "link1";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=link1&sort=".$sort_link.">link1</a></th>";
									$columnname = "link2";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=link2&sort=".$sort_link.">link2</a></th>";
									$columnname = "link3";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=link3&sort=".$sort_link.">link3</a></th>";
									$columnname = "link4";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=link4&sort=".$sort_link.">link4</a></th>";
									$columnname = "focus1";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=focus1&sort=".$sort_link.">focus1</a></th>";
									$columnname = "focus2";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=focus2&sort=".$sort_link.">focus2</a></th>";
									$columnname = "focus3";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=focus3&sort=".$sort_link.">focus3</a></th>";
 ?>
                                            <th><?php translate('Actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($result)): ?>
                                            <tr>
                                                <?php echo "<td>" . htmlspecialchars($row['id_ttep_student'] ?? "") . "</td>";
																					echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['ttep_teacher_username']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['ttep_teacher_username']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['ttep_teacher_username']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['ttep_teacher_username']) .'" target="_blank" class="uploaded_file" id="link_ttep_teacher_username">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['ttep_teacher_username'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['purpose']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['purpose']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['purpose']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['purpose']) .'" target="_blank" class="uploaded_file" id="link_purpose">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['purpose'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['time']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['time']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['time']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['time']) .'" target="_blank" class="uploaded_file" id="link_time">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['time'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['firstname']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['firstname']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['firstname']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['firstname']) .'" target="_blank" class="uploaded_file" id="link_firstname">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['firstname'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['lastname']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['lastname']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['lastname']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['lastname']) .'" target="_blank" class="uploaded_file" id="link_lastname">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['lastname'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['age']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['age']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['age']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['age']) .'" target="_blank" class="uploaded_file" id="link_age">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['age'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['needed_sessions']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['needed_sessions']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['needed_sessions']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['needed_sessions']) .'" target="_blank" class="uploaded_file" id="link_needed_sessions">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['needed_sessions'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['extra_information']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['extra_information']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['extra_information']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['extra_information']) .'" target="_blank" class="uploaded_file" id="link_extra_information">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['extra_information'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['start_date']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['start_date']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['start_date']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['start_date']) .'" target="_blank" class="uploaded_file" id="link_start_date">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['start_date'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['books']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['books']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['books']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['books']) .'" target="_blank" class="uploaded_file" id="link_books">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['books'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['extra1']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['extra1']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['extra1']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['extra1']) .'" target="_blank" class="uploaded_file" id="link_extra1">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['extra1'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['base_pay']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['base_pay']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['base_pay']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['base_pay']) .'" target="_blank" class="uploaded_file" id="link_base_pay">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['base_pay'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['day']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['day']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['day']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['day']) .'" target="_blank" class="uploaded_file" id="link_day">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['day'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['extra2']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['extra2']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['extra2']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['extra2']) .'" target="_blank" class="uploaded_file" id="link_extra2">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['extra2'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['mobile_number']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['mobile_number']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['mobile_number']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['mobile_number']) .'" target="_blank" class="uploaded_file" id="link_mobile_number">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['mobile_number'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['email']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['email']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['email']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['email']) .'" target="_blank" class="uploaded_file" id="link_email">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['email'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['active']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['active']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['active']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['active']) .'" target="_blank" class="uploaded_file" id="link_active">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['active'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['st_username']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['st_username']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['st_username']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['st_username']) .'" target="_blank" class="uploaded_file" id="link_st_username">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['st_username'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['st_password']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['st_password']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['st_password']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['st_password']) .'" target="_blank" class="uploaded_file" id="link_st_password">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['st_password'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['material']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['material']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['material']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['material']) .'" target="_blank" class="uploaded_file" id="link_material">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['material'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['link1']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['link1']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['link1']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['link1']) .'" target="_blank" class="uploaded_file" id="link_link1">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['link1'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['link2']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['link2']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['link2']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['link2']) .'" target="_blank" class="uploaded_file" id="link_link2">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['link2'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['link3']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['link3']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['link3']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['link3']) .'" target="_blank" class="uploaded_file" id="link_link3">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['link3'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['link4']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['link4']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['link4']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['link4']) .'" target="_blank" class="uploaded_file" id="link_link4">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['link4'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['focus1']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['focus1']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['focus1']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['focus1']) .'" target="_blank" class="uploaded_file" id="link_focus1">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['focus1'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['focus2']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['focus2']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['focus2']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['focus2']) .'" target="_blank" class="uploaded_file" id="link_focus2">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['focus2'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_student']["columns"]['focus3']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_student']["columns"]['focus3']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_student']["columns"]['focus3']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['focus3']) .'" target="_blank" class="uploaded_file" id="link_focus3">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['focus3'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t"; ?>
                                                <td>
                                                    <?php
                                                    $column_id = 'id_ttep_student';
                                                    if (!empty($column_id)): ?>
                                                        <a id='read-<?php echo $row['id_ttep_student']; ?>' href='ttep_student-read.php?id_ttep_student=<?php echo $row['id_ttep_student']; ?>' title='<?php echo addslashes(translate('View Record', false)); ?>' data-toggle='tooltip' class='btn btn-sm btn-info'><i class='far fa-eye'></i></a>
                                                        <a id='update-<?php echo $row['id_ttep_student']; ?>' href='ttep_student-update.php?id_ttep_student=<?php echo $row['id_ttep_student']; ?>' title='<?php echo addslashes(translate('Update Record', false)); ?>' data-toggle='tooltip' class='btn btn-sm btn-warning'><i class='far fa-edit'></i></a>
                                                        <a id='delete-<?php echo $row['id_ttep_student']; ?>' href='ttep_student-delete.php?id_ttep_student=<?php echo $row['id_ttep_student']; ?>' title='<?php echo addslashes(translate('Delete Record', false)); ?>' data-toggle='tooltip' class='btn btn-sm btn-danger'><i class='far fa-trash-alt'></i></a>
                                                    <?php else: ?>
                                                        <?php echo addslashes(translate('unsupported_no_pk')); ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>


                                <ul class="pagination" align-right>
                                <?php
                                    $new_url = preg_replace('/&?pageno=[^&]*/', '', $currenturl);
                                    ?>
                                    <li class="page-item"><a class="page-link" href="<?php echo $new_url .'&pageno=1' ?>"><?php translate('First') ?></a></li>
                                    <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo $new_url ."&pageno=".($pageno - 1); } ?>"><?php translate('Prev') ?></a>
                                    </li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo $new_url . "&pageno=".($pageno + 1); } ?>"><?php translate('Next') ?></a>
                                    </li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                        <a class="page-item"><a class="page-link" href="<?php echo $new_url .'&pageno=' . $total_pages; ?>"><?php translate('Last') ?></a>
                                    </li>
                                </ul>

                                <?php mysqli_free_result($result); ?>
                            <?php else: ?>
                            <p class='lead'><em><?php translate('No records were found.') ?></em></p>
                        <?php endif ?>

                    <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                            ERROR: Could not able to execute <?php echo $sql. " " . mysqli_error($link); ?>
                        </div>
                    <?php endif ?>

                    <?php mysqli_close($link) ?>
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
