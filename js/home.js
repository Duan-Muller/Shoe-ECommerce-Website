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
        $('#register-link').html(`Welcome ${userFirstName}`).attr('href', '#');
    } else {
        $('#register-link').html('Register').attr('href', 'register.php');
    }
}

function fetchUserProfile() {
    $.ajax({
        url: 'functions/home_contr.inc.php?action=get_user_profile',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            renderUserProfile(data);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

function renderUserProfile(userProfile) {
    const mainSection = $('main');
    mainSection.empty(); // Clear the existing content

    const headerSection = $(`
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">User Profile</h1>
                </div>
            </div>
        </header>
    `);
    mainSection.append(headerSection);

    // Create a new section to display the user's profile
    const profileSection = $(`
             <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h4>Details</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>First Name: </strong> ${userProfile.name}</p>
                                <p><strong>Last Name: </strong> ${userProfile.surname}</p>
                                <p><strong>Email: </strong> ${userProfile.email}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <form action="functions/logout.inc.php" onsubmit="clearCart(event)">
                <div id="btnContainer">
                    <button id="logoutBtn" type="submit" class="btn btn-primary">
                        Logout
                    </button>
                </div>
            </form>
    `);

    mainSection.append(profileSection);
}

function clearCart(event) {
    event.preventDefault(); // Prevent the form from submitting immediately

    // Send an AJAX request to clear the cart
    $.ajax({
        url: 'functions/home_contr.inc.php',
        type: 'POST',
        data: {
            action: 'clear_cart'
        },
        success: function(response) {
            const responseData = JSON.parse(response);
            console.log(responseData.message);
            // Redirect to the logout page after clearing the cart
            window.location.href = 'functions/logout.inc.php';
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            // Redirect to the logout page even if there's an error
            window.location.href = 'functions/logout.inc.php';
        }
    });
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

    $('#cartLink').on('click', function(e) {
        e.preventDefault();
        fetchCartItems();
    });

    fetchCartCount();

    $('#register-link').on('click', function(e) {
        if ($(this).attr('href') === 'register.php') {
            // User is not logged in, allow the link to navigate to register.php
            return true; // Return true to allow the default link behavior
        } else {
            e.preventDefault();
            if ($(this).attr('href') === '#') {
                fetchUserProfile();
            }
        }
    });

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
                    <p class="lead fw-normal text-white-50 mb-0">Slide Kicks. All the kicks you need.</p>
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
                            <span>R${product.price}</span>
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <button class="btn btn-outline-dark mt-auto view-product-btn" data-product-id="${product.shoe_id}">View Now</button>
                        </div>
                    </div>
                </div>
            </div>
        `);
        productRow.append(productCard);
    });

}

$(document).on('click', '.view-product-btn', function() {
    const productId = $(this).data('product-id');
    fetchProductDetails(productId);
});

function fetchProductDetails(productId) {
    $.ajax({
        url: 'functions/home_contr.inc.php?action=get_product_details&product_id=' + productId,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            showProductModal(data);
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}

function showProductModal(product) {
    // Fetch all available colors and sizes for the selected product
    $.ajax({
        url: 'functions/home_contr.inc.php?action=get_product_variants&brand=' + product.brand + '&model=' + product.model,
        type: 'GET',
        dataType: 'json',
        success: function(variants) {
            const modal = $(`
                <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel">${product.model}</h5>
                            </div>
                            <div class="modal-body">
                                <img src="${product.image_path}" alt="${product.model}" class="img-fluid" id="productImage">
                                <p>Price: R${product.price}</p>
                                <div class="form-group">
                                    <label for="colorSelect">Color:</label>
                                    <select class="form-control" id="colorSelect">
                                        ${variants.map(variant => `<option value="${variant.color}" data-image-path="${variant.image_path}">${variant.color}</option>`).join('')}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sizeSelect">Size:</label>
                                    <select class="form-control" id="sizeSelect">
                                        ${getAvailableSizes(variants, variants[0].color).map(size => `<option value="${size}">${size}</option>`).join('')}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantityInput">Quantity:</label>
                                    <input type="number" class="form-control" id="quantityInput" min="1" value="1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="addToCartBtn">Add to Cart</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            `);

            $('body').append(modal);
            $('#productModal').modal('show');

            modal.on('click', function(e) {
                const modalContent = $('.modal-content');
                if (!modalContent.is(e.target) && modalContent.has(e.target).length === 0) {
                    // Click occurred outside the modal content area
                    $('#productModal').modal('hide');
                    $('#productModal').remove();
                }
            });

            $('#closeModal').on('click', function() {
                $('#productModal').modal('hide');
                $('#productModal').remove();
            });

            $('#colorSelect').on('change', function() {
                const selectedColor = $(this).val();
                const selectedImagePath = $(this).find('option:selected').data('image-path');
                $('#productImage').attr('src', selectedImagePath);

                const availableSizes = getAvailableSizes(variants, selectedColor);
                const sizeSelect = $('#sizeSelect');
                sizeSelect.empty();
                availableSizes.forEach(size => {
                    sizeSelect.append(`<option value="${size}">${size}</option>`);
                });
            });

            $.ajax({
                url: 'functions/login_contr.inc.php?action=check_login',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.isLoggedIn) {
                        // User is logged in, enable the "Add to Cart" button and attach click event handler
                        $('#addToCartBtn').prop('disabled', false);
                        $('#addToCartBtn').text('Add to Cart');
                        $('#addToCartBtn').on('click', function() {
                            console.log(product.shoe_id, $('#colorSelect').val(), $('#sizeSelect').val(), $('#quantityInput').val());
                            addToCart(product.shoe_id, $('#colorSelect').val(), $('#sizeSelect').val(), product.price, $('#quantityInput').val(), $('#productImage').attr('src'));
                        });
                    } else {
                        // User is not logged in, disable the "Add to Cart" button
                        $('#addToCartBtn').prop('disabled', true);
                        $('#addToCartBtn').text('Log in to add to cart');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}

function getAvailableSizes(variants, color) {
    return variants.filter(variant => variant.color === color).map(variant => variant.size);
}

function fetchCartItems() {
    $.ajax({
        url: 'functions/home_contr.inc.php',
        type: 'POST',
        data: {
            action: 'get_cart_items'
        },
        success: function(cartItemsData) {
            const cartItems = JSON.parse(cartItemsData);
            if (Array.isArray(cartItems)) {
                updateCartDisplay(cartItems);
            } else {
                console.error('Error: cartItems is not an array');
            }
            console.log('Cart items:', cartItems);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            toastr.error('Login first');
        }
    });
}

function updateCartDisplay(cartItems) {
    const mainSection = $('main');
    mainSection.empty(); // Clear the existing content

    // Create the header section for the cart
    const headerSection = $(`
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Your Cart</h1>
                </div>
            </div>
        </header>
    `);
    mainSection.append(headerSection);

    // Render the cart items section
    const cartSection = $(`
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="cart-items">
            </div>
            <div class="cart-total">
                <p>Subtotal: <span id="cart-subtotal">R0.00</span></p>
                <p>Shipping, taxes, and discounts calculated at checkout.</p>
                <button class="btn btn-primary">Checkout</button>
                <p class="mt-3">Secured by Snipcart</p>
                <div class="payment-methods">
                    <i class="bi bi-credit-card-fill"></i>
                    <i class="bi bi-paypal"></i>
                </div>
            </div>
        </div>
    </section>
    `);

    mainSection.append(cartSection);

    const cartRow = cartSection.find('.row');

    if (Array.isArray(cartItems) && cartItems.length > 0) {
        const cartItemsContainer = cartSection.find('.cart-items');
        let subtotal = 0;

        cartItems.forEach(item => {
            const itemHTML = `
            <div class="cart-item mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <img src="${item.image_path}" alt="${item.model}" class="img-fluid">
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">${item.brand} ${item.model}</h5>
                            <span class="price">R${item.price}</span>
                        </div>
                        <p>${item.color}</p>
                        <p>Size: ${item.size}</p>
                        <p>Quantity: ${item.quantity}</p>
                        <div class="d-flex justify-content-between align-items-center">                         
                            <button class="btn btn-outline-danger remove-from-cart-btn" data-cart-id="${item.cart_id}">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

            cartItemsContainer.append(itemHTML);
            subtotal += item.price * item.quantity;
        });

        $('#cart-subtotal').text(`R${subtotal.toFixed(2)}`);
    } else {
        const emptyCartMessage = $(`
            <div class="text-center">
                <h5 class="fw-bolder">Your cart is empty</h5>
            </div>
        `);
        cartSection.find('.cart-items').append(emptyCartMessage);
    }
}

function addToCart(productId, color, size, quantity, price, image_path) {
    console.log(productId, color, size, quantity, price, image_path);
    $.ajax({
        url: 'functions/home_contr.inc.php',
        type: 'POST',
        data: {
            action: 'add_to_cart',
            product_id: productId,
            color: color,
            size: size,
            quantity: quantity,
            price: price,
            image_path: image_path
        },
        success: function(response) {
            const responseData = JSON.parse(response);
            console.log(responseData.message);

            $('#productModal').modal('hide');
            $('#productModal').remove();

            toastr.success('Product added to cart!');

            fetchCartCount();
        },
        error: function(xhr, status, error) {
            if (xhr.status === 401) {
                alert('You must be logged in to add items to the cart.');
            } else {
                console.error('Error:', error);
            }
        }
    });
}

function fetchCartCount() {
    $.ajax({
        url: 'functions/home_contr.inc.php',
        type: 'POST',
        data: {
            action: 'get_cart_count'
        },
        success: function(response) {
            const responseData = JSON.parse(response);
            const cartCount = responseData.cart_count;
            $('#cartCount').text(cartCount);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

$(document).on('click', '.remove-from-cart-btn', function() {
    const cartId = $(this).data('cart-id');
    removeFromCart(cartId);
});

function removeFromCart(cartId) {
    $.ajax({
        url: 'functions/home_contr.inc.php',
        type: 'POST',
        data: {
            action: 'remove_from_cart',
            cart_id: cartId
        },
        success: function(response) {
            const responseData = JSON.parse(response);
            console.log(responseData.message);
            fetchCartItems(); // Refresh the cart display
            fetchCartCount();
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}