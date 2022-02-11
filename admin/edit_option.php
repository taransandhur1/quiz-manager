<?php
include "../includes/admin_dashboard_header.php";
include "../includes/db_connection.php";

$id = $_GET["id"];
$quiz_id = $_GET["quiz_id"];

$question = "";
$question_number = "";
$option1 = "";
$option2 = "";
$option3 = "";
$option1 = "";
$answer = "";

$query = "SELECT * FROM questions WHERE id=$id";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($query_run)) {
    $question = $row["question"];
    $question_number = $row["question_no"];
    $option1 = $row["option1"];
    $option2 = $row["option2"];
    $option3 = $row["option3"];
    $option4 = $row["option4"];
    $answer = $row["answer"];
}

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Question & Answers</h1>
    </div>

    <div class="card-body">
        <div class="col-lg-12">
            <form name="edit_question_form" action="" method="post">
                <div class="card">

                    <div class="card-body card-block">
                        <div class="form-group">
                            <label class=" form-control-label"><strong>Question Number</strong></label>
                            <input type="text" name="question_number" class="form-control" value="<?php echo $question_number; ?>">
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label"><strong>Question</strong></label>
                            <input type="text" name="question" class="form-control" value="<?php echo $question; ?>">
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label"><strong>Option 1</strong></label>
                            <input type="text" name="option_1" class="form-control" value="<?php echo $option1; ?>">
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label"><strong>Option 2</strong></label>
                            <input type="text" name="option_2" class="form-control" value="<?php echo $option2; ?>">
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label"><strong>Option 3</strong></label>
                            <input type="text" name="option_3" class="form-control" value="<?php echo $option3; ?>">
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label"><strong>Option 4</strong></label>
                            <input type="text" name="option_4" class="form-control" value="<?php echo $option4; ?>">
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label"><strong>Answer</strong></label>
                            <input type="text" name="answer" class="form-control" value="<?php echo $answer; ?>">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="update_question" value="Update" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</main>

<?php
if (isset($_POST["update_question"])) {
    mysqli_query($connection, "UPDATE questions SET 
        question = '$_POST[question]',
        question_no = '$_POST[question_number]',
        option1 = '$_POST[option_1]',
        option2 = '$_POST[option_2]', 
        option3 = '$_POST[option_3]',
        option4 = '$_POST[option_4]',
        answer = '$_POST[answer]' 
        WHERE id = $id") or die(mysqli_error($connection));
?>
    <script type="text/javascript">
        window.location = "add_edit_questions_answers.php?id=<?php echo $quiz_id ?>";
    </script>
<?php
}
?>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
</body>

</html>