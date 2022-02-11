<?php
session_start();
include 'includes/db_connection.php';

if (isset($_POST['login_button'])) {
    $username_login = mysqli_real_escape_string($connection, $_POST['username']);
    $password_login = mysqli_real_escape_string($connection, $_POST['password']);
    // Hash password
    $password_login = md5($password_login);

    $query = "SELECT * FROM users WHERE username='$username_login' AND password='$password_login'";
    $query_run = mysqli_query($connection, $query);
    $usertype = mysqli_fetch_array($query_run);
    // Verify password
    if (mysqli_num_rows($query_run) > 0) {
        // Check user permissions
        if ($usertype['permission'] == "edit") {
            $_SESSION['username'] = $username_login;
            $_SESSION['permission'] = "edit";
            header('Location: admin/admin_dashboard.php');
        } else if ($usertype['permission'] == "view") {
            $_SESSION['username'] = $username_login;
            $_SESSION['permission'] = "view";
            header('Location: user_homepage.php');
        } else {
            $_SESSION['username'] = $username_login;
            $_SESSION['permission'] = "restricted";
            header('Location: restricted_user_homepage.php');
        }
    } else {
        $_SESSION['status'] = "Invalid username or password!";
        header('Location: login.php');
    }
}
