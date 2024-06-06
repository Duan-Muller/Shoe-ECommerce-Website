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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Slide Kicks</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-fixed-top">
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
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
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
                <div class="ms-auto d-flex align-items-center">
                    <a class="nav-link cart-link" href="#" id="cartLink">
                        <i class="bi bi-cart cart-icon"></i>
                        <span class="cart-text">Cart</span>
                        <span class="badge badge-pill badge-danger" id="cartCount"></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="home-container">
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

        <section class="free-shipping py-5 bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="mb-4 text-white">Free Shipping</h2>
                        <p style="color: white">At Slide Kicks, we understand the importance of providing our customers with a hassle-free shopping experience. That's why we offer free worldwide shipping on all orders, regardless of the order value or destination.</p>
                        <p style="color: white">Our reliable shipping partners ensure that your new kicks are delivered to your doorstep in a timely manner, so you can start rocking them as soon as possible. We take pride in our efficient logistics and aim to provide you with a smooth and seamless delivery process.</p>
                        <p style="color: white">Whether you're shopping from across the street or on the other side of the globe, you can enjoy the convenience of free shipping when you order from Slide Kicks. It's our way of showing our appreciation for your trust in our brand and commitment to exceptional customer service.</p>
                    </div>
                    <div class="col-md-6">
                        <img src="img/deliver.svg" alt="Free Shipping" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </section>

        <section class="30-days-return py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/return.svg" alt="Return Policy" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6">
                        <h2 class="mb-4">30 Days Return Policy</h2>
                        <p>At Slide Kicks, we stand behind the quality of our products, but we also understand that sometimes, things just don't work out. That's why we offer a hassle-free 30-day return policy, ensuring that you can shop with confidence.</p>
                        <p>If for any reason you're not completely satisfied with your purchase, you can return it to us within 30 days of delivery for a full refund or exchange. No questions asked, no complicated procedures – just a simple and straightforward process that puts your satisfaction first.</p>
                        <p>We want you to feel confident in your purchase, knowing that if something doesn't meet your expectations, you have the option to return it without any hassle. Our goal is to provide you with an exceptional shopping experience, and our 30-day return policy is just one of the ways we strive to achieve that.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-us py-5 bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="mb-4 text-white">Contact Us</h2>
                        <p style="color: white">At Slide Kicks, we value open communication and are committed to providing exceptional customer service. Whether you have a question, concern, or simply want to share your thoughts with us, our dedicated team is here to assist you.</p>
                        <p style="color: white">You can reach out to us through various channels, including email, phone, or our user-friendly support system. Our knowledgeable and friendly representatives are always ready to lend a helping hand, ensuring that your inquiries are addressed promptly and to your satisfaction.</p>
                        <p style="color: white">We believe in building lasting relationships with our customers, and that starts with being approachable and responsive. Feel free to contact us anytime, and we'll do our best to ensure that your experience with Slide Kicks is nothing short of remarkable.</p>
                    </div>
                    <div class="col-md-6">
                        <img src="img/contact.svg" alt="Contact Us" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </section>



    </div>
</main>
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Slide Kicks 2024</p></div>
</footer>
</body>
</html>