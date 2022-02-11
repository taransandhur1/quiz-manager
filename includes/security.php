<?php
session_start();
if (!$_SESSION['username']) {
    header('Location: /quiz-manager/login.php');
}
