$(document).ready(function () {

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
                              </tr>`;
            $('#products-table tbody').append(row);
        })
    }

    $(document).ready(function () {
        //Ajax call to add product to database
        $(document).on('click','#add-product-button',function (){
            let isValid = validateForm();
            if (!isValid) {
                return;
            }

            let formData = new FormData();
            formData.append('brand', $('#add-brand').val());
            formData.append('model', $('#add-model').val());
            formData.append('size', $('#add-size').val());
            formData.append('color', $('#add-color').val());
            formData.append('price', $('#add-price').val());
            formData.append('quantity', $('#add-quantity').val());
            formData.append('product-image', $('#add-image')[0].files[0]);

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
            }
            return isValid;

        }

        function clearFormFields(){
            $('#add-brand').val('');
            $('#add-model').val('');
            $('#add-size').val('');
            $('#add-color').val('');
            $('#add-price').val('');
            $('#add-quantity').val('');
            $('#add-image').val('');
        }
    });

    $(document).ready(function () {
        //Ajax call to search database for given product
        $(document).on('click','#search-product-button',function (){
            searchProducts();
        });

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

        function clearSearchFields(){
            $('#search-brand').val('');
            $('#search-model').val('');
        }

    });
    //Ajax call to retrieve all users stored in database
    $(document).ready(function () {
        $(document).on('click', '#view-all-users', function () {
            fetchUsers();
        });
    })

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

    function updateUserTable(users) {
        $('#users-table tbody').empty();

        $.each(users, function (index, user) {
            let row = `<tr>
                                  <th scope="row">${user.id}</th>
                                  <td>${user.name}</td>
                                  <td>${user.surname}</td>
                                  <td>${user.email}</td>
                                  <td>${user.joined}</td>                                
                              </tr>`;
            $('#users-table tbody').append(row);
        })
    }


})



