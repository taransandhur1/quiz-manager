<?php
include "includes/db_connection.php";
include "login_handler.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/login.css" rel="stylesheet">
</head>

<body class="text-center">
    <form action="login_handler.php" name="login_form" method="post" class="form-login">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <label for="inputUser" class="sr-only">Username</label>
        <input type="text" name="username" id="inputUser" class="form-control" placeholder="Enter your username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Enter your password" required>

        <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            echo '<h4 class="bg-danger text-white">' . $_SESSION['status'] . ' </h4>';
            unset($_SESSION['status']);
        }
        ?>

        <button type="submit" name="login_button" class="btn btn-lg btn-primary btn-block">Login</button>
    </form>
</body>

</html>