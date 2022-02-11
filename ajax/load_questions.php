<?php
include "../includes/security.php";
include "../includes/user_homepage_header.php";
include "../includes/db_connection.php";

$question_no = "";
$question = "";
$option1 = "";
$option2 = "";
$option3 = "";
$option4 = "";
$answer = "";
$question_count = 0;
$ans = "";

$question_number = $_GET["questionNumber"];

if (isset($_SESSION["answer"][$question_number])) {
    $ans = $_SESSION["answer"][$question_number];
}

$query = "SELECT * FROM questions WHERE category = '$_SESSION[quiz_category]' && question_no = '$_GET[questionNumber]'";
$query_run = mysqli_query($connection, $query);

$question_count = mysqli_num_rows($query_run);

if ($question_count == 0) {
    echo "End of quiz";
    header('Location: ../result.php');
} else {
    while ($row = mysqli_fetch_array($query_run)) {
        $question_no = $row["question_no"];
        $question = $row["question"];
        $option1 = $row["option1"];
        $option2 = $row["option2"];
        $option3 = $row["option3"];
        $option4 = $row["option4"];
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

<table>
    <tr>
        <td>
            <input type="radio" name="r1" id="r1" value="<?php echo $option1; ?>">
        </td>
        <td style="padding-left: 5px">
            <?php
            echo $option1;
            ?>

        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="radio2" id="radio2" value="<?php echo $option2; ?>">
        </td>
        <td style="padding-left: 5px">
            <?php
            echo $option2;
            ?>

        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="radio3" id="radio3" value="<?php echo $option3; ?>">
        </td>
        <td style="padding-left: 5px">
            <?php
            echo $option3;
            ?>

        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="radio4" id="radio4" value="<?php echo $option4; ?>">
        </td>
        <td style="padding-left: 5px">
            <?php
            echo $option4;
            ?>

        </td>
    </tr>
</table>