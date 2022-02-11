<?php
include "logo.php";
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/user_homepage.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand">
            <img src="<?php echo $logo; ?>" alt="<?php echo $logo_alternative; ?>" class="logo">
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/quiz-manager/user_homepage.php">Home </a>
                </li>
            </ul>
            <div class="user-session">
                <span class="admin-name" style="color: white"><?php echo $_SESSION['username']; ?></span>
            </div>
            <form class="form-inline my-2 my-lg-0" action="logout.php" method="POST">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>