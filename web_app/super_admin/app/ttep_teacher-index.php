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

$total_pages_sql = "SELECT COUNT(*) FROM `ttep_teacher`";
$result = mysqli_query($link,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

//Column sorting on column name
$columns = array('id_ttep_teacher', 'firstname', 'lastname', 'age', 'expertise', 'email', 'city', 'address_country', 'address_address', 'signiture', 'username', 'website', 'contact_number', 'id_ttep_community', 'gender', 'password', 'image_path', 'nativelang', 'teachlang', 'status', 'days_left', 'sitetitle', 'about_me', 'duration', 'hobby', 'interest_1', 'interest_2', 'born', 'instagram', 'linkedin', 'facebook', 'twitter', 'skill_1', 'skill_2', 'skill_3', 'currency', 'create_date');
// Order by primary key on default
$order = 'id_ttep_teacher';
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
    if (strpos('`ttep_teacher`.`id_ttep_teacher`, `ttep_teacher`.`firstname`, `ttep_teacher`.`lastname`, `ttep_teacher`.`age`, `ttep_teacher`.`expertise`, `ttep_teacher`.`email`, `ttep_teacher`.`city`, `ttep_teacher`.`address_country`, `ttep_teacher`.`address_address`, `ttep_teacher`.`signiture`, `ttep_teacher`.`username`, `ttep_teacher`.`website`, `ttep_teacher`.`contact_number`, `ttep_teacher`.`id_ttep_community`, `ttep_teacher`.`gender`, `ttep_teacher`.`password`, `ttep_teacher`.`image_path`, `ttep_teacher`.`nativelang`, `ttep_teacher`.`teachlang`, `ttep_teacher`.`status`, `ttep_teacher`.`days_left`, `ttep_teacher`.`sitetitle`, `ttep_teacher`.`about_me`, `ttep_teacher`.`duration`, `ttep_teacher`.`hobby`, `ttep_teacher`.`interest_1`, `ttep_teacher`.`interest_2`, `ttep_teacher`.`born`, `ttep_teacher`.`instagram`, `ttep_teacher`.`linkedin`, `ttep_teacher`.`facebook`, `ttep_teacher`.`twitter`, `ttep_teacher`.`skill_1`, `ttep_teacher`.`skill_2`, `ttep_teacher`.`skill_3`, `ttep_teacher`.`currency`, `ttep_teacher`.`create_date`', ',')) {
        $where_statement .= " AND CONCAT_WS (`ttep_teacher`.`id_ttep_teacher`, `ttep_teacher`.`firstname`, `ttep_teacher`.`lastname`, `ttep_teacher`.`age`, `ttep_teacher`.`expertise`, `ttep_teacher`.`email`, `ttep_teacher`.`city`, `ttep_teacher`.`address_country`, `ttep_teacher`.`address_address`, `ttep_teacher`.`signiture`, `ttep_teacher`.`username`, `ttep_teacher`.`website`, `ttep_teacher`.`contact_number`, `ttep_teacher`.`id_ttep_community`, `ttep_teacher`.`gender`, `ttep_teacher`.`password`, `ttep_teacher`.`image_path`, `ttep_teacher`.`nativelang`, `ttep_teacher`.`teachlang`, `ttep_teacher`.`status`, `ttep_teacher`.`days_left`, `ttep_teacher`.`sitetitle`, `ttep_teacher`.`about_me`, `ttep_teacher`.`duration`, `ttep_teacher`.`hobby`, `ttep_teacher`.`interest_1`, `ttep_teacher`.`interest_2`, `ttep_teacher`.`born`, `ttep_teacher`.`instagram`, `ttep_teacher`.`linkedin`, `ttep_teacher`.`facebook`, `ttep_teacher`.`twitter`, `ttep_teacher`.`skill_1`, `ttep_teacher`.`skill_2`, `ttep_teacher`.`skill_3`, `ttep_teacher`.`currency`, `ttep_teacher`.`create_date`) LIKE '%$search%'";
    } else {
        $where_statement .= " AND `ttep_teacher`.`id_ttep_teacher`, `ttep_teacher`.`firstname`, `ttep_teacher`.`lastname`, `ttep_teacher`.`age`, `ttep_teacher`.`expertise`, `ttep_teacher`.`email`, `ttep_teacher`.`city`, `ttep_teacher`.`address_country`, `ttep_teacher`.`address_address`, `ttep_teacher`.`signiture`, `ttep_teacher`.`username`, `ttep_teacher`.`website`, `ttep_teacher`.`contact_number`, `ttep_teacher`.`id_ttep_community`, `ttep_teacher`.`gender`, `ttep_teacher`.`password`, `ttep_teacher`.`image_path`, `ttep_teacher`.`nativelang`, `ttep_teacher`.`teachlang`, `ttep_teacher`.`status`, `ttep_teacher`.`days_left`, `ttep_teacher`.`sitetitle`, `ttep_teacher`.`about_me`, `ttep_teacher`.`duration`, `ttep_teacher`.`hobby`, `ttep_teacher`.`interest_1`, `ttep_teacher`.`interest_2`, `ttep_teacher`.`born`, `ttep_teacher`.`instagram`, `ttep_teacher`.`linkedin`, `ttep_teacher`.`facebook`, `ttep_teacher`.`twitter`, `ttep_teacher`.`skill_1`, `ttep_teacher`.`skill_2`, `ttep_teacher`.`skill_3`, `ttep_teacher`.`currency`, `ttep_teacher`.`create_date` LIKE '%$search%'";
    }

} else {
    $search = "";
}

$order_clause = !empty($order) ? "ORDER BY `$order` $sort" : '';
$group_clause = !empty($order) && $order == 'id_ttep_teacher' ? "GROUP BY `ttep_teacher`.`$order`" : '';

// Prepare SQL queries
$sql = "SELECT `ttep_teacher`.* 
        FROM `ttep_teacher` 
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
    exportAsCSV($data, $db_name, $tables_and_columns_names, 'ttep_teacher', $link, false);
    exit;
}

$count_pages = "SELECT COUNT(*) AS count
                FROM `ttep_teacher` 
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
                        Teachers' information
                        EOD;
                        ?>
                        <h2 class="float-left"><?php translate('%s Details', true, $str) ?></h2>
                        <a href="ttep_teacher-create.php" class="btn btn-success float-right"><?php translate('Add New Record') ?></a>
                        <a href="ttep_teacher-index.php" class="btn btn-info float-right mr-2"><?php translate('Reset View') ?></a>
                        <a href="ttep_teacher-index.php?export=csv" class="btn btn-primary float-right mr-2"><?php translate('Export as CSV') ?></a>
                        <a href="javascript:history.back()" class="btn btn-secondary float-right mr-2"><?php translate('Back') ?></a>
                    </div>

                    <div class="form-row">
                        <form action="ttep_teacher-index.php" method="get">
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
                                            <?php 									$columnname = "id_ttep_teacher";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=id_ttep_teacher&sort=".$sort_link.">id_ttep_teacher</a></th>";
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
									$columnname = "expertise";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=expertise&sort=".$sort_link.">expertise</a></th>";
									$columnname = "email";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=email&sort=".$sort_link.">email</a></th>";
									$columnname = "city";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=city&sort=".$sort_link.">city</a></th>";
									$columnname = "address_country";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=address_country&sort=".$sort_link.">address_country</a></th>";
									$columnname = "address_address";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=address_address&sort=".$sort_link.">address_address</a></th>";
									$columnname = "signiture";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=signiture&sort=".$sort_link.">signiture</a></th>";
									$columnname = "username";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=username&sort=".$sort_link.">username</a></th>";
									$columnname = "website";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=website&sort=".$sort_link.">website</a></th>";
									$columnname = "contact_number";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=contact_number&sort=".$sort_link.">contact_number</a></th>";
									$columnname = "id_ttep_community";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=id_ttep_community&sort=".$sort_link.">id_ttep_community</a></th>";
									$columnname = "gender";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=gender&sort=".$sort_link.">gender</a></th>";
									$columnname = "password";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=password&sort=".$sort_link.">password</a></th>";
									$columnname = "image_path";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=image_path&sort=".$sort_link.">image_path</a></th>";
									$columnname = "nativelang";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=nativelang&sort=".$sort_link.">nativelang</a></th>";
									$columnname = "teachlang";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=teachlang&sort=".$sort_link.">teachlang</a></th>";
									$columnname = "status";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=status&sort=".$sort_link.">status</a></th>";
									$columnname = "days_left";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=days_left&sort=".$sort_link.">days_left</a></th>";
									$columnname = "sitetitle";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=sitetitle&sort=".$sort_link.">sitetitle</a></th>";
									$columnname = "about_me";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=about_me&sort=".$sort_link.">about_me</a></th>";
									$columnname = "duration";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=duration&sort=".$sort_link.">duration</a></th>";
									$columnname = "hobby";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=hobby&sort=".$sort_link.">hobby</a></th>";
									$columnname = "interest_1";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=interest_1&sort=".$sort_link.">interest_1</a></th>";
									$columnname = "interest_2";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=interest_2&sort=".$sort_link.">interest_2</a></th>";
									$columnname = "born";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=born&sort=".$sort_link.">born</a></th>";
									$columnname = "instagram";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=instagram&sort=".$sort_link.">instagram</a></th>";
									$columnname = "linkedin";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=linkedin&sort=".$sort_link.">linkedin</a></th>";
									$columnname = "facebook";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=facebook&sort=".$sort_link.">facebook</a></th>";
									$columnname = "twitter";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=twitter&sort=".$sort_link.">twitter</a></th>";
									$columnname = "skill_1";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=skill_1&sort=".$sort_link.">skill_1</a></th>";
									$columnname = "skill_2";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=skill_2&sort=".$sort_link.">skill_2</a></th>";
									$columnname = "skill_3";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=skill_3&sort=".$sort_link.">skill_3</a></th>";
									$columnname = "currency";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=currency&sort=".$sort_link.">currency</a></th>";
									$columnname = "create_date";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=create_date&sort=".$sort_link.">create_date</a></th>";
 ?>
                                            <th><?php translate('Actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($result)): ?>
                                            <tr>
                                                <?php echo "<td>" . htmlspecialchars($row['id_ttep_teacher'] ?? "") . "</td>";
																					echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['firstname']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['firstname']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['firstname']['is_file'];
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
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['lastname']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['lastname']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['lastname']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['lastname']) .'" target="_blank" class="uploaded_file" id="link_lastname">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['lastname'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";echo "<td>" . htmlspecialchars($row['age'] ?? "") . "</td>";
																					echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['expertise']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['expertise']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['expertise']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['expertise']) .'" target="_blank" class="uploaded_file" id="link_expertise">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['expertise'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['email']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['email']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['email']['is_file'];
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
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['city']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['city']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['city']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['city']) .'" target="_blank" class="uploaded_file" id="link_city">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['city'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['address_country']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['address_country']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['address_country']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['address_country']) .'" target="_blank" class="uploaded_file" id="link_address_country">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['address_country'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['address_address']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['address_address']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['address_address']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['address_address']) .'" target="_blank" class="uploaded_file" id="link_address_address">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['address_address'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['signiture']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['signiture']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['signiture']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['signiture']) .'" target="_blank" class="uploaded_file" id="link_signiture">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['signiture'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['username']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['username']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['username']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['username']) .'" target="_blank" class="uploaded_file" id="link_username">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['username'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['website']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['website']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['website']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['website']) .'" target="_blank" class="uploaded_file" id="link_website">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['website'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['contact_number']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['contact_number']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['contact_number']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['contact_number']) .'" target="_blank" class="uploaded_file" id="link_contact_number">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['contact_number'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";echo "<td>" . htmlspecialchars($row['id_ttep_community'] ?? "") . "</td>";
																					echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['gender']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['gender']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['gender']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['gender']) .'" target="_blank" class="uploaded_file" id="link_gender">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['gender'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['password']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['password']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['password']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['password']) .'" target="_blank" class="uploaded_file" id="link_password">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['password'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['image_path']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['image_path']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['image_path']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['image_path']) .'" target="_blank" class="uploaded_file" id="link_image_path">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['image_path'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['nativelang']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['nativelang']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['nativelang']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['nativelang']) .'" target="_blank" class="uploaded_file" id="link_nativelang">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['nativelang'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['teachlang']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['teachlang']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['teachlang']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['teachlang']) .'" target="_blank" class="uploaded_file" id="link_teachlang">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['teachlang'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['status']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['status']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['status']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['status']) .'" target="_blank" class="uploaded_file" id="link_status">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['status'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['days_left']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['days_left']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['days_left']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['days_left']) .'" target="_blank" class="uploaded_file" id="link_days_left">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['days_left'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['sitetitle']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['sitetitle']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['sitetitle']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['sitetitle']) .'" target="_blank" class="uploaded_file" id="link_sitetitle">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['sitetitle'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['about_me']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['about_me']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['about_me']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['about_me']) .'" target="_blank" class="uploaded_file" id="link_about_me">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['about_me'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['duration']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['duration']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['duration']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['duration']) .'" target="_blank" class="uploaded_file" id="link_duration">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['duration'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['hobby']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['hobby']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['hobby']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['hobby']) .'" target="_blank" class="uploaded_file" id="link_hobby">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['hobby'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['interest_1']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['interest_1']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['interest_1']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['interest_1']) .'" target="_blank" class="uploaded_file" id="link_interest_1">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['interest_1'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['interest_2']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['interest_2']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['interest_2']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['interest_2']) .'" target="_blank" class="uploaded_file" id="link_interest_2">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['interest_2'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['born']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['born']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['born']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['born']) .'" target="_blank" class="uploaded_file" id="link_born">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['born'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['instagram']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['instagram']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['instagram']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['instagram']) .'" target="_blank" class="uploaded_file" id="link_instagram">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['instagram'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['linkedin']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['linkedin']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['linkedin']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['linkedin']) .'" target="_blank" class="uploaded_file" id="link_linkedin">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['linkedin'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['facebook']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['facebook']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['facebook']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['facebook']) .'" target="_blank" class="uploaded_file" id="link_facebook">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['facebook'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['twitter']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['twitter']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['twitter']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['twitter']) .'" target="_blank" class="uploaded_file" id="link_twitter">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['twitter'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['skill_1']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['skill_1']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['skill_1']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['skill_1']) .'" target="_blank" class="uploaded_file" id="link_skill_1">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['skill_1'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['skill_2']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['skill_2']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['skill_2']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['skill_2']) .'" target="_blank" class="uploaded_file" id="link_skill_2">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['skill_2'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['skill_3']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['skill_3']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['skill_3']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['skill_3']) .'" target="_blank" class="uploaded_file" id="link_skill_3">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['skill_3'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['ttep_teacher']["columns"]['currency']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['ttep_teacher']["columns"]['currency']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['ttep_teacher']["columns"]['currency']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['currency']) .'" target="_blank" class="uploaded_file" id="link_currency">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['currency'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";echo "<td>" . htmlspecialchars($row['create_date'] ?? "") . "</td>";
										 ?>
                                                <td>
                                                    <?php
                                                    $column_id = 'id_ttep_teacher';
                                                    if (!empty($column_id)): ?>
                                                        <a id='read-<?php echo $row['id_ttep_teacher']; ?>' href='ttep_teacher-read.php?id_ttep_teacher=<?php echo $row['id_ttep_teacher']; ?>' title='<?php echo addslashes(translate('View Record', false)); ?>' data-toggle='tooltip' class='btn btn-sm btn-info'><i class='far fa-eye'></i></a>
                                                        <a id='update-<?php echo $row['id_ttep_teacher']; ?>' href='ttep_teacher-update.php?id_ttep_teacher=<?php echo $row['id_ttep_teacher']; ?>' title='<?php echo addslashes(translate('Update Record', false)); ?>' data-toggle='tooltip' class='btn btn-sm btn-warning'><i class='far fa-edit'></i></a>
                                                        <a id='delete-<?php echo $row['id_ttep_teacher']; ?>' href='ttep_teacher-delete.php?id_ttep_teacher=<?php echo $row['id_ttep_teacher']; ?>' title='<?php echo addslashes(translate('Delete Record', false)); ?>' data-toggle='tooltip' class='btn btn-sm btn-danger'><i class='far fa-trash-alt'></i></a>
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
