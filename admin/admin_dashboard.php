<?php
include "../includes/admin_dashboard_header.php";
include "../includes/db_connection.php";
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form class="form" name="quiz_form" action="" method="post">
                <div class="card-body">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Add New Quiz Category</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Enter your quiz title</label>
                                    <input type="text" name="quiz_name" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit_quiz" value="Add Quiz" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong class="card-title">Quiz List</strong></div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Count the number of categories created
                                        $count = 0;
                                        $res = mysqli_query($connection, "SELECT * FROM quiz_category");
                                        while ($row = mysqli_fetch_array($res)) {
                                            $count = $count + 1;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $count; ?></th>
                                                <td><?php echo $row["category"]; ?></td>
                                                <td><a href="edit_quiz_name.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                                                <td><a href="delete_quiz.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                                            </tr>
                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</main>

<?php
if (isset($_POST["submit_quiz"])) {
    mysqli_query($connection, "INSERT INTO quiz_category VALUES(NULL,'$_POST[quiz_name]')") or die(mysqli_error($connection));

?>
    <script type="text/javascript">
        alert("Quiz added successfully!");
        // Direct back to current page after message
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