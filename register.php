<?php
require_once "functions/config_session.inc.php";
require_once "functions/signup_view.inc.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/register.css" rel="stylesheet">
    <title>Slide Kicks Registration</title>
</head>

<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src = "img/logo2.jpg" width="60" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="register.php">Register</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>

<body>

<div class="registration-form">
    <section id="heading">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <h3>
                    Slide Kicks Registration
                </h3>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <form id="registerForm" role="form" action="functions/signup.inc.php" method="post">
                <?php
                signup_inputs();
                ?>

                <div id="btnContainer">
                    <button id="registerBtn" type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>

                <p><a href="login.php">Already have an account? Sign in</a></p>
            </form>
        </div>
        <div class="col-md-4" style="color: red;">
            <?php
            check_signup_errors();
            ?>
        </div>
    </div>

</div>

<section id="error-reporting">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4" style="text-align: center">

        </div>
        <div class="col-md-4">
        </div>
    </div>
</section>

</body>

</html>
