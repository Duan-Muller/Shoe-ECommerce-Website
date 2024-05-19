$(document).ready(function () {

    $(document).on('', '#view-all-products', function () {
        fetchProducts();
    });

    $(document).on('click', '#view-all-products', function () {
        fetchProducts();
    });

    function fetchProducts() {
        $.ajax({
            url: '../functions/admin_contr.inc.php',
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
})

// When the user clicks on <div>, open the popup
function myFunction() {
    let popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
