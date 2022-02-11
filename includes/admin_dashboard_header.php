<?php
include "logo.php";
session_start();
if ($_SESSION['permission'] != "edit") {
    header('Location: ../login.php');
    exit;
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/admin_dashboard.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" style="color: white">Admin Panel</a>
        <a>
            <img src="<?php echo $logo; ?>" alt="<?php echo $logo_alternative; ?>" class="logo">
        </a>
        <ul class="navbar-nav px-1">
            <form class="form-inline my-2 my-lg-0" action="/quiz-manager/logout.php" method="POST">
                <div class="user-session">
                    <span class="admin-name" style="color: white"><?php echo $_SESSION['username']; ?></span>
                </div>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </ul>
    </nav>

    <!-- Side bar -->
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="admin_dashboard.php">
                                <span data-feather="edit"></span>
                                Add & Edit Quiz
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="select_quiz_category.php">
                                <span data-feather="edit"></span>
                                Add & Edit Questions
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- Side bar -->