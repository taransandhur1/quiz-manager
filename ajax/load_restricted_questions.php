<?php
include "../includes/security.php";
include "../includes/user_homepage_header.php";
include "../includes/db_connection.php";

$question_no = "";
$question = "";
$question_count = 0;
$ans = "";

$question_number = $_GET["questionNumber"];

if (isset($_SESSION["answer"][$question_number])) {
    $ans = $_SESSION["answer"][$question_number];
}

$query_run = mysqli_query($connection, "SELECT * FROM questions WHERE category = '$_SESSION[quiz_category]' && question_no = '$_GET[questionNumber]'");

$question_count = mysqli_num_rows($query_run);

if ($question_count == 0) {
    echo "End of quiz";
} else {
    while ($row = mysqli_fetch_array($query_run)) {
        $question_no = $row["question_no"];
        $question = $row["question"];
    }
}
?>
<br>
<table>
    <tr>
        <td style="font-weight: bold; font-size: 18px; padding-right: 2px; width: 50%" colspan="2">
            <?php echo "(" . $question_no . ") " . $question; ?>
        </td>
    </tr>
</table>