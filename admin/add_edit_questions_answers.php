<?php
include "../includes/admin_dashboard_header.php";
include "../includes/db_connection.php";

$id = $_GET["id"];
$query = "SELECT * FROM quiz_category WHERE id=$id";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($query_run)) {
    $quiz_category = $row["category"];
}

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $quiz_category ?>: Add or Edit Questions & Answers</h1>
    </div>

    <!-- ADD QUESTIONS AND ANSWERS -->
    <div class="card-body">
        <div class="col-lg-6">
            <form name="add_question_form" action="" method="post">
                <div class="card">

                    <div class="card-body card-block">
                        <div class="form-group">
                            <h4>Add Question & Answers</h4>
                            <label class=" form-control-label"><strong>Question</strong></label>
                            <input type="text" name="question" class="form-control" placeholder="Enter question" required="required">
                        </div>

                        <div class="form-group">
                            <label class=" form-control-label"><strong>Option 1</strong></label>
                            <input type="text" name="option_1" class="form-control" placeholder="Enter an answer for option 1" required="required">
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label"><strong>Option 2</strong></label>
                            <input type="text" name="option_2" class="form-control" placeholder="Enter an answer for option 2" required="required">
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label"><strong>Option 3</strong></label>
                            <input type="text" name="option_3" class="form-control" placeholder="Enter an answer for option 3" required="required">
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label"><strong>Option 4</strong></label>
                            <input type="text" name="option_4" class="form-control" placeholder="Enter an answer for option 4" required="required">
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label"><strong>Answer</strong></label>
                            <input type="text" name="answer" class="form-control" placeholder="Enter answer" required="required">
                        </div>


                        <div class="form-group">
                            <input type="submit" name="add_question" value="Add Question" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ADD QUESTIONS AND ANSWERS -->

    <!-- EDIT AND VIEW QUESTIONS -->
    <div class="card-body">
        <div class="col-lg-12">
            <div class="card">
                <h4>Edit Questions & Answers</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Questions</th>
                            <th>Option 1</th>
                            <th>Option 2</th>
                            <th>Option 3</th>
                            <th>Option 4</th>
                            <th>Answer</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM questions WHERE category='$quiz_category' ORDER BY question_no asc";
                        $query_run = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_array($query_run)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $row["question_no"]; ?></th>
                                <td><?php echo $row["question"]; ?></td>
                                <td><?php echo $row["option1"]; ?></td>
                                <td><?php echo $row["option2"]; ?></td>
                                <td><?php echo $row["option3"]; ?></td>
                                <td><?php echo $row["option4"]; ?></td>
                                <td><?php echo $row["answer"]; ?></td>
                                <td><a href="edit_option.php?id=<?php echo $row["id"]; ?>&quiz_id=<?php echo $id; ?>">Edit</a></td>
                                <td><a href="delete_option.php?id=<?php echo $row["id"]; ?>&quiz_id=<?php echo $id; ?>">Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- EDIT AND VIEW QUESTIONS -->
</main>


<?php
if (isset($_POST["add_question"])) {
    $loop = 0;
    $count = 0;
    $res = mysqli_query($connection, "SELECT * FROM questions WHERE category='$quiz_category' ORDER BY id asc") or die(mysqli_error($connection));

    $count = mysqli_num_rows($res);

    if ($count == 0) {
    } else {
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop + 1;
            mysqli_query($connection, "UPDATE questions SET question_num='$loop' WHERE id=$row[id]");
        }
    }
    $loop = $loop + 1;

    mysqli_query($connection, "INSERT INTO questions values
    (
        NULL,
        '$loop', 
        '$_POST[question]', 
        '$_POST[option_1]', 
        '$_POST[option_2]', 
        '$_POST[option_3]', 
        '$_POST[option_4]',
        '$_POST[answer]',
        '$quiz_category'
    )") or die(mysqli_error($connection));

?>
    <script type="text/javascript">
        alert("Question added successfully");
        window.location.href = window.location.href;
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