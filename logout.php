<?php
session_start();
session_destroy();
unset($_SESSION['username']);
?>
<script type="text/javascript" ?$_POST>
    window.location = "login.php";
</script>