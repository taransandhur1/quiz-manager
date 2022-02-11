<?php
include "includes/security.php";
include "includes/user_homepage_header.php";
include "includes/db_connection.php";
?>

<main role="main" class="container">

    <div class="starter-template">
        <?php
        $correct = 0;
        $incorrect = 0;

        if (isset($_SESSION["answer"])) {
            for ($selected = 1; $selected <= sizeof($_SESSION["answer"]); $selected++) {
                $answer = "";
                $query = "SELECT * FROM questions WHERE category = '$_SESSION[quiz_category]' && question_no = $selected";
                $query_run = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($query_run)) {
                    $answer = $row["answer"];
                }
                // Selected answer
                if (isset($_SESSION["answer"][$selected])) {
                    // Answer in table
                    if ($answer == $_SESSION["answer"][$selected]) {
                        $correct = $correct + 1;
                    } else {
                        $incorrect = $incorrect + 1;
                    }
                } else { // No selection is wrong by default
                    $incorrect = $incorrect + 1;
                }
            }
        }

        $total_questions = 0;
        $result = mysqli_query($connection, $query);
        $total_questions = mysqli_num_rows($result);
        $incorrect = $total_questions - $correct;
        echo "<br><br>";
        echo "<center>";
        echo "Total Questions=" . $total_questions;
        echo "<br>";
        echo "Correct Answer=" . $correct;
        echo "<br>";
        echo "Incorrect Answer=" . $incorrect;
        echo "</center>";

        ?>
    </div>
    <?php
    if (isset($_SESSION["quiz_start"])) {
        $query = "INSERT INTO quiz_results
    (
        id, 
        username, 
        total_questions, 
        correct_answer, 
        ncorrect_answer
    ) 
    VALUES 
    (
        NULL, 
        '$_SESSION[username]', 
        '$_SESSION[quiz_category]', 
        '$total_questions', 
        '$correct', 
        '$incorrect'
    )";

        mysqli_query($connection, $query);
    }

    if (isset($_SESSION["quiz_start"])) {
        unset($_SESSION["quiz_start"]);
    ?>
        <script type="text/javascript">
            window.location.href = window.location.href
        </script>
    <?php
    }
    ?>
</main>

</body>

</html>