<?php
include "../includes/admin_dashboard_header.php";
include "../includes/db_connection.php";
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Select a quiz to add/edit questions</h1>
    </div>

    <div class="card card-outline-secondary">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Quiz Category</th>
                        <th scope="col">Select</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    $res = mysqli_query($connection, "SELECT * FROM quiz_category");
                    while ($row = mysqli_fetch_array($res)) {
                        $count = $count + 1;
                    ?>
                        <tr>
                            <th scope="row"><?php echo $count; ?></th>
                            <td><?php echo $row["category"]; ?></td>
                            <td><a href="add_edit_questions_answers.php?id=<?php echo $row["id"]; ?>">Select</td>
                        </tr>
                    <?php
                    }

                    ?>

                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
</body>

</html>