<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="register.css" rel="stylesheet">
    <title>Document</title>

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
                        <a class="nav-link active" aria-current="page" href="home.html">Home</a>
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
                        <a class="nav-link" href="register.php">Login</a>
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

<div class="container-fluid">
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
            <form role="form">
                <div class="form-group">

                    <label for="first-name">
                        First Name
                    </label>
                    <input type="text" class="form-control" id="first-name" />
                </div>

                <div class="form-group">

                    <label for="last-name">
                        Last Name
                    </label>
                    <input type="text" class="form-control" id="last-name" />
                </div>

                <div class="form-group">

                    <label for="email">
                        Email address
                    </label>
                    <input type="email" class="form-control" id="email" />
                </div>
                <div class="form-group">

                    <label for="password">
                        Password
                    </label>
                    <input type="password" class="form-control" id="password" />
                </div>

                <div class="form-group">
                    <label for="confirm-password">
                        Confirm Password
                    </label>
                    <input type="password" class="form-control" id="confirm-password" />
                </div>

                <div id="btnContainer">
                    <button id="registerBtn" type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>