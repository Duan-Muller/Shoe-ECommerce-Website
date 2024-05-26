function fetchUserFirstName(){
    fetch('functions/login_contr.inc.php?action=get_user_firstname')
        .then(response => response.text())
        .then(userFirstName => {
            updateNavbar(userFirstName);
        })
        .catch(error => {
            console.error('Error:', error);
        })
}

function updateNavbar(userFirstName) {
    console.log(userFirstName);
    if (userFirstName !== '' && userFirstName !== undefined && userFirstName !== null) {
        $('#register-link').html(`Welcome ${userFirstName}`).attr('href', 'profile.php');
    } else {
        $('#register-link').html('Register').attr('href', 'register.php');
    }
}

$(document).ready(function() {
    fetchUserFirstName()

    $.ajax({
        url: 'functions/home_contr.inc.php?action=get_brands',
        type: 'GET',
        dataType: 'json',
        success: function (data){
            let brandLinksDropdown = $('#brand-links-dropdown');
            $.each(data, function(index, brand){
                let brandLink = $('<a class ="dropdown-item" href="#">' + brand.brand + '</a>');
                brandLinksDropdown.append($('<li></li>')).append(brandLink);
            });

            $('.dropdown-item', brandLinksDropdown).click(function(e){
                e.preventDefault();
                let brand = $(this).text();
                fetchProductsByBrand(brand);
            });
        }
    })
});

function fetchProductsByBrand(brand){

    $.ajax({
        url: 'functions/home_contr.inc.php?action=get_products&brand=' + brand,
        type: 'GET',
        dataType: 'json',
        success: function (data){
            console.log(data);
            renderProductCards(data);
        }
    })
}

function renderProductCards(data) {
    const mainSection = $('main');
    mainSection.empty(); // Clear the existing content

    // Remove the carousel section
    $('.new-releases-banner').remove();

    // Create the header section
    const headerSection = $(`
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop ${data[0].brand}</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop homepage template</p>
                </div>
            </div>
        </header>
    `);
    mainSection.append(headerSection);

    // Render the product section
    const productSection = $(`
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                </div>
            </div>
        </section>
    `);
    mainSection.append(productSection);

    const productRow = productSection.find('.row');

    $.each(data, function(index, product) {
        const productCard = $(`
            <div class="col mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="${product.image_path}" alt="${product.model}">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">${product.model}</h5>
                            <span>${product.price}</span>
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        `);
        productRow.append(productCard);
    });
}

