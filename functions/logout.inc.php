<?php

session_start();
session_unset();
session_destroy();
setcookie("firstname", $_SESSION['user_firstname'], time() - 3600, "/");

header("Location: ../home.php");
die();