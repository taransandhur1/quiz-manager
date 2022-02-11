<?php
include "../includes/db_connection.php";

$id = $_GET["id"];
mysqli_query($connection, "DELETE FROM quiz_category WHERE id=$id") or die(mysqli_error($connection));
?>

<script type="text/javascript">
    alert("Quiz deleted successfully!");
    window.location = "admin_dashboard.php";
</script>