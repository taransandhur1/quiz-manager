<?php
include "../includes/security.php";
include "../includes/db_connection.php";

$quiz_category = $_GET["quiz_category"];
$_SESSION["quiz_category"] = $quiz_category;
// $query = "SELECT FROM quiz_category WHERE category = '$quiz_category'";
$res = mysqli_query($connection, "SELECT * FROM quiz_category WHERE category = '$quiz_category'");
