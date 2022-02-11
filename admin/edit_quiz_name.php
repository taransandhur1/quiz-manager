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
        <h1 class="h2">Admin Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form class="form" name="quiz-form" action="" method="post">
                <div class="card-body">
                    <div class="col-lg-6">
                        <div class="card">

                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label"><strong>Edit Quiz Name</strong></label>
                                    <input type="text" name="quiz_name" class="form-control" value="<?php echo $quiz_category; ?>">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="submit_quiz" value="Update" class="btn btn-success">
                                </div>
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
    mysqli_query($connection, "UPDATE quiz_category SET category='$_POST[quiz_name]' WHERE id = $id") or die(mysqli_error($connection));

?>
    <script type="text/javascript">
        alert("Quiz name updated successfully!");
        window.location.href = "admin_dashboard.php";
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