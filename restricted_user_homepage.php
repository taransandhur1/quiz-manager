<?php
include "includes/security.php";
include "includes/user_homepage_header.php";
include "includes/db_connection.php";

?>

<main role="main" class="container">

    <div class="starter-template">
        <h1>Quiz Categories</h1>
        <p class="lead">Select a quiz category below to begin.</p>

        <!-- RETRIEVE LIST OF QUIZ CATEGORIES -->
        <?php
        $query = "SELECT * FROM quiz_category";
        $query_run = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($query_run)) {
        ?>
            <input type="button" class="btn btnsuccess form-control" value="<?php echo $row["category"]; ?>" style="margin-top:10px; background-color: blue; color: white; width: 500px;" onclick="set_quiz_session(this.value);">
        <?php
        }
        ?>
        <!-- RETRIEVE LIST OF QUIZ CATEGORIES -->
    </div>
</main>

<script type="text/javascript">
    function set_quiz_session(quiz_category) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "view_restricted_questions.php";
            }
        };
        xmlhttp.open("GET", "ajax/set_quiz_session.php?quiz_category=" + quiz_category, true);
        xmlhttp.send(null);
    }
</script>

</body>

</html>