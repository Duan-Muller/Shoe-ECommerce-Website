$(document).ready(function () {
    //updating progress bars on page load
    updateProgressBars();

    $(document).on('click', '#view-all-products', function () {
        fetchProducts();
    });
    //Ajax call to retrieve all products stored in database
    function fetchProducts() {
        $.ajax({
            url: 'functions/admin_contr.inc.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                updateTable(data);
            },
            error: function (xhr, status, error) {
                console.log('Error fetching products: ', error);
            }
        });
    }
    //updating shoes table with db data
    function updateTable(products) {
        $('#products-table tbody').empty();

        $.each(products, function (index, product) {
            let row = `<tr>
                                  <th scope="row">${product.shoe_id}</th>
                                  <td>${product.brand}</td>
                                  <td>${product.model}</td>
                                  <td>${product.size}</td>
                                  <td>${product.color}</td>
                                  <td>${product.price}</td>
                                  <td>${product.image_path}</td>
                                  <td>${product.quantity}</td>
                                  <td>${product.gender}</td>
                                  <td><button class="delete-product-btn" data-product-id="${product.shoe_id}"><i class="fas fa-trash-alt"></i></button></td>  
                                  <td><button class="edit-product-btn" data-product-id="${product.shoe_id}"><i class="fas fa-pencil-alt"></i></button></td>
                              </tr>`;
            $('#products-table tbody').append(row);
        })
    }

    //Ajax call to add product to database
    $(document).on('click','#add-product-button',function (){
            let isValid = validateForm();
            if (!isValid) {
                return;
            }

            let formData = new FormData();
            formData.append('action', 'add_product');
            formData.append('brand', $('#add-brand').val());
            formData.append('model', $('#add-model').val());
            formData.append('size', $('#add-size').val());
            formData.append('color', $('#add-color').val());
            formData.append('price', $('#add-price').val());
            formData.append('quantity', $('#add-quantity').val());
            formData.append('product-image', $('#add-image')[0].files[0]);
            formData.append('gender', $('#add-gender').val());

            $.ajax({
                url: 'functions/admin_contr.inc.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    toastr.success(response.message,'Product Added Successfully');
                    $('#addProductModal').modal('hide');
                    clearFormFields();
                },
                error: function (xhr, status, error) {
                    console.log('Error adding product: ', error);
                    toastr.error(error.message,'Error');
                }
            })
    })
    //ensuring the add product form is filled in
    function validateForm(){
            let isValid = true;
            let brand = $('#add-brand').val().trim();
            // console.log('brand input:',brand);
            let model = $('#add-model').val().trim();
            // console.log('model input:',model);
            let size = $('#add-size').val().trim();
            // console.log('size input:',size);
            let color = $('#add-color').val().trim();
            // console.log('color input:',color);
            let price = $('#add-price').val().trim();
            // console.log('price input:',price);
            let quantity = $('#add-quantity').val().trim();
            // console.log('quantity input:',quantity)
            let image = $('#add-image')[0].files[0];
            // console.log('image input:',image)
            let gender = $('#add-gender').val().trim();

            if (brand === ''){
                isValid = false;
                alert('Please enter a brand name!');
            } else if (model === ''){
                isValid = false;
                alert('Please enter a model name!');
            } else if (size === ''){
                isValid = false;
                alert('Please enter a size!');
            } else if (color ===''){
                isValid = false;
                alert('Please enter a color!');
            } else if (price ===''){
                isValid = false;
                alert('Please enter a price!');
            } else if (quantity ===''){
                isValid = false;
                alert('Please enter a quantity!');
            } else if (!image){
                isValid = false;
                alert('Please upload an image!');
            } else if (!gender) {
                isValid = false;
                alert('Please select a gender!');
            }
            return isValid;
    }
    //clearing form field on successful add of product
    function clearFormFields(){
            $('#add-brand').val('');
            $('#add-model').val('');
            $('#add-size').val('');
            $('#add-color').val('');
            $('#add-price').val('');
            $('#add-quantity').val('');
            $('#add-image').val('');
    }

    //Ajax call to search database for given product
    $(document).on('click','#search-product-button',function (){
        searchProducts();
    });
    //ajax call to search products based on user input
    function searchProducts(){
        let brand = $('#search-brand').val().trim();
        let model = $('#search-model').val().trim();

        $.ajax({
            url: 'functions/admin_contr.inc.php',
            type: 'GET',
            data: {
                search:true,
                brand:brand,
                model:model
            },
            dataType: 'json',
            success: function (data) {
                updateTable(data);
                toastr.success('Search Successful','Success');
                $('#searchProductModal').modal('hide');
                clearSearchFields();
                },
                error: function (xhr, status, error) {
                console.log('Error searching products: ', error);
                toastr.error('Search Unsuccessful','Error');
                }
        })
    }
    //clearing search fields after searching
    function clearSearchFields(){
        $('#search-brand').val('');
        $('#search-model').val('');
    }
    //ajax call to delete product
    $(document).on('click', '.delete-product-btn', function () {
        const productId = $(this).data('product-id');

        if (confirm('Are you sure you want to delete this product?')) {
            $.ajax({
                url: 'functions/admin_contr.inc.php',
                type: 'POST',
                data: {
                    action: 'delete_product',
                    productId: productId
                },
                success: function (response) {
                    toastr.success(response.message,'Product Deleted Successfully');
                    fetchProducts();
                    },
                    error: function (xhr, status, error) {
                        console.log('Error deleting product: ', error);
                        toastr.error(error.message,'Error');
                    }
                })
            }
        });

    //Ajax call to retrieve all users stored in database
    $(document).on('click', '#view-all-users', function () {
        fetchUsers();
    });

    function fetchUsers() {
        $.ajax({
            url: 'functions/admin_contr.inc.php?action=get_users',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                updateUserTable(data);
            },
            error: function (xhr, status, error) {
                console.log('Error fetching users: ', error);
            }
        });
    }
    //updating user table after data has been retrieved
    function updateUserTable(users) {
        $('#users-table tbody').empty();

        $.each(users, function (index, user) {
            let row = `<tr>
                                  <th scope="row">${user.id}</th>
                                  <td>${user.name}</td>
                                  <td>${user.surname}</td>
                                  <td>${user.email}</td>
                                  <td>${user.joined}</td>          
                                  <td><button class="edit-user-btn" data-user-id="${user.id}"><i class="fas fa-pencil-alt"></i></button></td>                      
                              </tr>`;
            $('#users-table tbody').append(row);
        })
    }
    //event handler for edit user button to populate modal with selected user's data
    $(document).on('click', '.edit-user-btn', function () {
        const userId = $(this).data('user-id');
        const updateUserBtn = $('#update-user-btn');

        updateUserBtn.data('user-id', userId);

        $.ajax({
            url:'functions/admin_contr.inc.php',
            type:'GET',
            data:{
                action:'get_user',
                userID: userId
            },
            dataType:'json',
            success: function (data) {
                $('#edit-name').val(data.name);
                $('#edit-surname').val(data.surname);
                $('#edit-email').val(data.email);
                $('#editUserModal').modal('show');
                },
                error: function (xhr, status, error) {
                    console.log('Error fetching user: ', error);
                    toastr.error('Failed to fetch user data','Error')
            }
        });
    });
    //ajax call to add updates to db
    $(document).on('click','#update-user-btn',function (){
        const userId = $(this).data('user-id');
        const name = $('#edit-name').val().trim();
        const surname = $('#edit-surname').val().trim();
        const email = $('#edit-email').val().trim();

        $.ajax({
            url: 'functions/admin_contr.inc.php',
            type: 'POST',
            data: {
                action:'update_user',
                userID:userId,
                name:name,
                surname:surname,
                email:email
            },
            success: function (response) {
                fetchUsers();
                $('#editUserModal').modal('hide');
                toastr.success('User updated successfully','Success');
                },
                error: function (xhr, status, error) {
                    console.log('Error updating user: ', error);
                    toastr.error('Failed to update user','Error')
            }
        })

    })

    $(document).on('click', '#view-all-orders', function () {
        fetchOrdersAndItems();
    });

    $(document).on('click', '#orders-table tbody tr', function () {
        const orderId = $(this).find('th').text();
        highlightSelectedRow(this);
        filterOrderItems(orderId);
    });

    $(document).on('click', '#order-items-table tbody tr', function () {
        const shoeId = $(this).find('td:nth-child(3)').text();
        getProductDetails(shoeId);
    });

    function highlightSelectedRow(row) {
        $('#orders-table tbody tr').removeClass('selected');
        $(row).addClass('selected');
    }

    function filterOrderItems(orderId) {
        $('#order-items-table tbody tr').each(function () {
            const orderItemOrderId = $(this).find('td:nth-child(2)').text();
            if (orderItemOrderId === orderId) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    function fetchOrdersAndItems() {
        $.ajax({
            url: 'functions/admin_contr.inc.php?action=get_orders_and_items',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                updateOrderTable(data.orders);
                updateOrderItemsTable(data.items);
            },
            error: function (xhr, status, error) {
                console.log('Error fetching orders and items: ', error);
            }
        });
    }

    function updateOrderTable(orders) {
        $('#orders-table tbody').empty();

        $.each(orders, function (index, order) {
            let row = `<tr>
                                  <th scope="row">${order.order_id}</th>
                                  <td>${order.user_id}</td>
                                  <td>${order.full_name}</td>
                                  <td>${order.email}</td>
                                  <td>${order.address}</td>
                                  <td>${order.city}</td>
                                  <td>${order.province}</td>
                                  <td>${order.zip_code}</td>  
                                  <td>${order.total_price}</td>
                                  <td>${order.order_date}</td>        
                              </tr>`;
            $('#orders-table tbody').append(row);
        })
    }

    function updateOrderItemsTable(items) {
        $('#order-items-table tbody').empty();

        $.each(items, function (index, item) {
            let row = `<tr>
                                  <th scope="row">${item.order_item_id}</th>
                                  <td>${item.order_id}</td>
                                  <td>${item.shoe_id}</td>
                                  <td>${item.color}</td>
                                  <td>${item.size}</td>
                                  <td>${item.quantity}</td>
                                  <td>${item.price}</td>
                              </tr>`;
            $('#order-items-table tbody').append(row);
        })
    }

    function getProductDetails(shoeId) {
        $.ajax({
            url: 'functions/admin_contr.inc.php',
            type: 'GET',
            data: {
                action: 'get_product_details',
                shoeId: shoeId
            },
            dataType: 'json',
            success: function (product) {
                updateProductDetailsModal(product);
                $('#productDetailsModal').modal('show');
            },
            error: function (xhr, status, error) {
                console.log('Error fetching product details: ', error);
            }
        });
    }

    function updateProductDetailsModal(product) {
        $('#product-image').attr('src', product.image_path);
        $('#product-brand').text(product.brand);
        $('#product-model').text(product.model);
        $('#product-size').text(product.size);
        $('#product-color').text(product.color);
        $('#product-price').text(product.price);
        $('#product-gender').text(product.gender);
    }

    $('#logoutLink').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: 'functions/logout.inc.php',
            type: 'GET',
            dataType: 'html',
            success: function (response) {
                toastr.success('Logged out successfully');
                window.location.href = 'home.php';
            },
            error: function (xhr, status, error) {
                console.log('Error logging out: ', error);

            }
        });
    });

    $(document).on('click', '#search-user-button', function () {
        const name = $('#search-name').val().trim();
        const surname = $('#search-lastname').val().trim();

        $.ajax({
            url: 'functions/admin_contr.inc.php',
            type: 'GET',
            data: {
                action: 'search_users',
                name: name,
                surname: surname
            },
            dataType: 'json',
            success: function (data) {
                updateUserTable(data);
                toastr.success('Search Successful', 'Success');
                $('#searchUserModal').modal('hide');
                clearSearchFields();
            },
            error: function (xhr, status, error) {
                console.log('Error searching users: ', error);
                toastr.error('Search Unsuccessful', 'Error');
            }
        });
    });

    $(document).on('click', '.edit-product-btn', function () {
        const productId = $(this).data('product-id');
        const updateProductBtn = $('#update-product-btn');
        updateProductBtn.data('product-id', productId);

        $.ajax({
            url: 'functions/admin_contr.inc.php',
            type: 'GET',
            data: {
                action: 'get_product_details',
                shoeId: productId
            },
            dataType: 'json',
            success: function (data) {
                $('#edit-brand').val(data.brand);
                $('#edit-model').val(data.model);
                $('#edit-size').val(data.size);
                $('#edit-color').val(data.color);
                $('#edit-price').val(data.price);
                $('#edit-quantity').val(data.quantity);
                $('#editProductModal').modal('show');
            },
            error: function (xhr, status, error) {
                console.log('Error fetching product: ', error);
                toastr.error('Failed to fetch product data', 'Error');
            }
        });
    });

    $(document).on('click', '#update-product-btn', function () {
        const productId = $(this).data('product-id');
        const brand = $('#edit-brand').val().trim();
        const model = $('#edit-model').val().trim();
        const size = $('#edit-size').val().trim();
        const color = $('#edit-color').val().trim();
        const price = $('#edit-price').val().trim();
        const quantity = $('#edit-quantity').val().trim();

        $.ajax({
            url: 'functions/admin_contr.inc.php',
            type: 'POST',
            data: {
                action: 'update_product',
                productId: productId,
                brand: brand,
                model: model,
                size: size,
                color: color,
                price: price,
                quantity: quantity
            },
            success: function (response) {
                fetchProducts(); // Refresh the products table
                $('#editProductModal').modal('hide');
                toastr.success('Product updated successfully', 'Success');
            },
            error: function (xhr, status, error) {
                console.log('Error updating product: ', error);
                toastr.error('Failed to update product', 'Error');
            }
        });
    });

})

$('.nav-link').click(function (e) {
    e.preventDefault();

    let page = $(this).attr('href');

    $.ajax({
        url: 'functions/admin_view.inc.php',
        type: 'POST',
        data: { page: page },
        success: function (response) {
            $('#main-content').html(response);
            if (page === 'home') {
                updateProgressBars(); // Call the updateProgressBars function after updating the content
            }

        }
    });
});
//function to update progress bars based on DB data
function updateProgressBars() {
    $('.circular-progress-bar').each(function () {
        const parentCard = $(this).parent().parent();
        const cardValue = parentCard.data('value');
        const maxSalesAmount = 100000;

        const cardId = parentCard.attr('id');
        let percentage;
        if (cardId === 'totalOrders') {
            const maxValue = 1000;
            percentage = (cardValue / maxValue) * 100;
        } else if (cardId === 'totalSales') {
            percentage = (cardValue / maxSalesAmount) * 100;
        } else if (cardId === 'amountOfStock') {
            const maxValue = 1000;
            percentage = (cardValue / maxValue) * 100;
        } else if (cardId === 'totalUsers') {
            const maxValue = 1000;
            percentage = (cardValue / maxValue) * 100;
        }

        const progressValue = $(this).find('.progress-value');
        const cardDescription = parentCard.find('.card-description');

        progressValue.text(`${percentage.toFixed(0)}%`);

        if (cardId === 'totalOrders') {
            cardDescription.text('Amount: ' + cardValue);
        } else if (cardId === 'totalSales') {
            cardDescription.text('Sales: R' + cardValue);
        } else if (cardId === 'amountOfStock') {
            cardDescription.text('Units: ' + cardValue);
        } else if (cardId === 'totalUsers') {
            cardDescription.text('Users: ' + cardValue);
        }

        const gradient = `conic-gradient(#02B9FFFF ${percentage}%, white ${percentage}% 100%)`;
        $(this).css('background', gradient);
    });
}