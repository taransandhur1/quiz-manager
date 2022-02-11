<?php
include "../includes/db_connection.php";

$id = $_GET["id"];
$quiz_id = $_GET["quiz_id"];

$query = "DELETE FROM questions WHERE id=$id";
mysqli_query($connection, $query);

?>
<script type="text/javascript">
    window.location = "add_edit_questions_answers.php?id=<?php echo $quiz_id ?>";
</script>