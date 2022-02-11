<?php
include "../includes/security.php";
include "../includes/user_homepage_header.php";
include "../includes/db_connection.php";


$total_questions = 0;
$resl = mysqli_query($connection, "SELECT * FROM questions WHERE category = '$_SESSION[quiz_category]'");
$total_questions = mysqli_num_rows($resl);
echo $total_questions;
