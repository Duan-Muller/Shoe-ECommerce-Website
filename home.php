<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <title>Slide Kicks</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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

<section class="new-releases-banner">
    <div class="top">
        <div class="row">

            <div class="col-md-12">
                <h1>New Releases</h1>
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <h1 class="name"><u>Nike Air</u></h1>
                            <h1 class="price">R700</h1>
                            <button type="button" class="btn btn-outline-success">Buy Now!</button>
                            <img src="img/air.png" class="d-block w-50" alt="...">
                        </div>

                        <div class="carousel-item">
                            <h1 class="name"><u>Nike Blazer</u></h1>
                            <h1 class="price">R700</h1>
                            <button type="button" class="btn btn-outline-success">Buy Now!</button>
                            <img src="img/blazer.png" class="d-block w-50" alt="...">
                        </div>

                        <div class="carousel-item">
                            <h1 class="name"><u>Comet Crater</u></h1>
                            <h1 class="price">R700</h1>
                            <button type="button" class="btn btn-outline-success">Buy Now!</button>
                            <img src="img/crater.png" class="d-block w-50" alt="...">
                        </div>

                        <div class="carousel-item">
                            <h1 class="name"><u>Space Hippie</u></h1>
                            <h1 class="price">R700</h1>
                            <button type="button" class="btn btn-outline-success">Buy Now!</button>
                            <img src="img/hippie.png" class="d-block w-50" alt="...">
                        </div>

                        <div class="carousel-item">
                            <h1 class="name"><u>Nike Air Jordan</u></h1>
                            <h1 class="price">R700</h1>
                            <button type="button" class="btn btn-outline-success">Buy Now!</button>
                            <img src="img/jordan.png" class="d-block w-50" alt="...">
                        </div>

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>


<main>

</main>

<footer>

</footer>
</body>
</html>