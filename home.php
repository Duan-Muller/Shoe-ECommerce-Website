<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/home.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <title>Slide Kicks</title>
</head>
<body>
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
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            View Products
                        </a>
                        <ul class="dropdown-menu" id="brand-links-dropdown"></ul>
                    </li>
                    <li class="nav-item">
                        <a id="register-link" class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
                <div class="ms-auto d-flex">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="cartLink">
                            <i class="bi bi-cart"></i> Cart
                            <span class="badge badge-pill badge-danger" id="cartCount"></span>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </nav>
</header>

<main>
    <section class="new-releases-banner">
        <div class="top">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="bg-dark">Popular Brands</h1>
                    <div class="logos">
                        <div class="logos-slide">
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                        </div>

                        <div class="logos-slide">
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                            <img src="img/logo-background.png" />
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="features py-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-box text-center bg-light">
                        <i class="bi bi-truck"></i>
                        <h5>FREE SHIPPING</h5>
                        <p>Free worldwide shipping on all orders.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box text-center">
                        <i class="bi bi-arrow-clockwise"></i>
                        <h5>30 DAYS RETURN</h5>
                        <p>No question return and easy refund in 14 days.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box text-center">
                        <i class="bi bi-headset"></i>
                        <h5>CONTACT US!</h5>
                        <p>Keep in touch via email and support system.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-us py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/about-us.jpg" alt="About Us" class="img-fluid rounded">
                </div>
                <div class="col-md-6">
                    <h2>About Slide Kicks</h2>
                    <p>Slide Kicks is a small, locally-owned business that specializes in selling high-quality sneakers and footwear. We are passionate about providing our customers with the latest and greatest in shoe fashion, while also offering exceptional customer service.</p>
                    <p>Our company was born out of a love for sneakers and a desire to create a unique shopping experience for sneaker enthusiasts. We carefully curate our selection to offer the best brands and styles, ensuring that our customers can find the perfect pair of shoes for any occasion.</p>
                    <p>At Slide Kicks, we believe in building lasting relationships with our customers. Our knowledgeable and friendly staff is always on hand to provide personalized recommendations and ensure that you find the perfect fit. We are committed to delivering a seamless shopping experience, from the moment you step into our store (or browse our website) until you take your first steps in your new kicks.</p>
                </div>
            </div>
        </div>
    </section>

</main>

<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Slide Kicks 2024</p></div>
</footer>
</body>
</html>