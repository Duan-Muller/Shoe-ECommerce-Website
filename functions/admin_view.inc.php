<?php

require_once 'admin_model.inc.php';

function loadHomeContent(){

    $totalStock = getTotalStock();
    $totalUsers = getTotalUsers();
    $totalSales = getTotalSales();
    $totalOrders = getTotalOrders();

    $homeContent ='
            <div class="container" id="home-content">
              <p class="container-title" style="color: black">Admin Dashboard</p>
            
              <div class="gradient-cards">
                <div class="card" id="totalOrders" data-value="'.$totalOrders.'">
                  <div class="container-card bg-green-box d-flex flex-column align-items-center">
                    <div class="circular-progress-bar">
                      <div class="progress-value"></div>
                    </div>
                    <p class="card-title">Total Orders</p>
                    <p class="card-description">Info here</p>
                  </div>
                </div>
            
                <div class="card" id="totalSales" data-value="'.$totalSales.'">
                  <div class="container-card bg-white-box d-flex flex-column align-items-center">
                    <div class="circular-progress-bar">
                      <div class="progress-value"></div>
                    </div>
                    <p class="card-title">Total Sales Amount</p>
                    <p class="card-description">Sales - total cost somehow</p>
                  </div>
                </div>
            
                <div class="card" id="amountOfStock" data-value="'.$totalStock.'">
                  <div class="container-card bg-yellow-box d-flex flex-column align-items-center">
                    <div class="circular-progress-bar">
                      <div class="progress-value"></div>
                    </div>
                    <p class="card-title">Total Amount of Stock</p>
                    <p class="card-description">Display total somehow</p>
                  </div>
                </div>
            
                <div class="card" id="totalUsers" data-value="'.$totalUsers.'">
                  <div class="container-card bg-blue-box d-flex flex-column align-items-center">
                    <div class="circular-progress-bar">
                      <div class="progress-value"></div>
                    </div>
                    <p class="card-title">Total Users</p>
                    <p class="card-description">Display total users</p>
                  </div>
                </div>
              </div>
            </div>';

    $homeContent .='<script>updateProgressBars()</script>';

    return $homeContent;
}

function loadProductsContent(){
    return '     
            <div class="page-layout products-page">
                <ul class="nav flex-column bg-dark" style="width: 15%; align-items: center; position: fixed; height: 100%">
                  <li class="nav-item">
                    <a id="view-all-products" class="nav-link active" aria-current="page" href="#">
                        <i class="fas fa-list"></i>
                        <span>View All</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        <i class="fas fa-plus"></i>
                        <span>Add Product</span>
                    </a>                       
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#searchProductModal">
                        <i class="fas fa-search"></i>
                        <span>Search Product</span>
                    </a>
                  </li>               
                </ul>
         
                 <div class="container-fluid">
                    <div class="row">                       
                        <div class="col-md-12">
                            <div class="table-container" style="margin-left: 15%;">
                                <div class="table-responsive">
                                    <table id="products-table" class="table table-hover table-striped">
                                      <thead>
                                        <tr>
                                          <th scope="col">ID</th>
                                          <th scope="col">Brand</th>
                                          <th scope="col">Model</th>
                                          <th scope="col">Size</th>
                                          <th scope="col">Color</th>
                                          <th scope="col">Price</th>
                                          <th scope="col">Image Path</th>
                                          <th scope="col">Quantity</th>
                                          <th scope="col">Gender</th>
                                        </tr>
                                      </thead>
                                      <tbody></tbody>
                                    </table>                            
                                </div>                              
                            </div>
                        </div>                      
                    </div>
                 </div>             
            </div>                      
            
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="productModalLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="add-brand" class="col-form-label">Brand:</label>
                        <input type="text" class="form-control" id="add-brand" >
                      </div>
                      <div class="mb-3">
                        <label for="add-Model" class="col-form-label">Model:</label>
                        <input type="text" class="form-control" id="add-model" >
                      </div>
                      <div class="mb-3">
                        <label for="add-size" class="col-form-label">Size:</label>
                        <input type="text" class="form-control" id="add-size" >
                      </div>
                      <div class="mb-3">
                        <label for="add-color" class="col-form-label">Color</label>
                        <input type="text" class="form-control" id="add-color" >
                      </div>
                      <div class="mb-3">
                        <label for="add-price" class="col-form-label">Price:</label>
                        <input type="text" class="form-control" id="add-price" >
                      </div>
                      <div class="mb-3">
                        <label for="add-quantity" class="col-form-label">Quantity:</label>
                        <input type="text" class="form-control" id="add-quantity" >
                      </div>
                      <div class="mb-3">
                        <label for="add-gender" class="col-form-label">Gender:</label>
                        <select class="form-control" id="add-gender">
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="add-image" class="col-form-label">Image:</label>
                        <input type="file" class="form-control" id="add-image" name="add-image" >
                      </div>    
                                      
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="add-product-button" type="button" class="btn btn-primary">Add Product</button>
                  </div>
                </div>
              </div>
            </div>          
            
            <div class="modal fade" id="searchProductModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="searchModalLabel">Search Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="search-brand" class="col-form-label">Brand:</label>
                        <input type="text" class="form-control" id="search-brand" >
                      </div>
                      <div class="mb-3">
                        <label for="search-Model" class="col-form-label">Model:</label>
                        <input type="text" class="form-control" id="search-model" >
                      </div>                                                                                      
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="search-product-button" type="button" class="btn btn-primary">Search Product</button>
                  </div>
                </div>
              </div>
            </div>     
            
            <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editProductModalLabel">Edit Product</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="edit-brand" class="col-form-label">Brand:</label>
                                    <input type="text" class="form-control" id="edit-brand">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-model" class="col-form-label">Model:</label>
                                    <input type="text" class="form-control" id="edit-model">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-size" class="col-form-label">Size:</label>
                                    <input type="text" class="form-control" id="edit-size">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-color" class="col-form-label">Color:</label>
                                    <input type="text" class="form-control" id="edit-color">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-price" class="col-form-label">Price:</label>
                                    <input type="text" class="form-control" id="edit-price">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-quantity" class="col-form-label">Quantity:</label>
                                    <input type="text" class="form-control" id="edit-quantity">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="update-product-btn" type="button" class="btn btn-primary">Update Product</button>
                        </div>
                    </div>
                </div>
            </div>
            
            ';
}

function loadUsersContent(){
    return '           
          <div class="page-layout users-page">
           <ul class="nav flex-column bg-dark" style="width: 15%; align-items: center; position: fixed; height: 100%">
                  <li class="nav-item">
                    <a id="view-all-users" class="nav-link active" aria-current="page" href="#">
                        <i class="fas fa-list"></i>
                        <span>View All</span>
                    </a>
                  </li>              
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#searchUserModal">
                        <i class="fas fa-search"></i>
                        <span>Search User</span>
                    </a>
                  </li>               
                </ul>
           
            <div class="container-fluid">
                    <div class="row">                       
                        <div class="col-md-12">
                            <div class="table-container" style="margin-left: 15%;">
                                <div class="table-responsive">
                                    <table id="users-table" class="table table-hover table-striped">
                                      <thead>
                                        <tr>
                                          <th scope="col">ID</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Surname</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Date Joined</th>                                   
                                        </tr>
                                      </thead>
                                      <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                      
                    </div>
                 </div>        
           </div> 
            
            <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="productModalLabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="edit-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="edit-name" >
                      </div>
                      <div class="mb-3">
                        <label for="edit-surname" class="col-form-label">Surname:</label>
                        <input type="text" class="form-control" id="edit-surname" >
                      </div>
                      <div class="mb-3">
                        <label for="edit-email" class="col-form-label">E-Mail:</label>
                        <input type="text" class="form-control" id="edit-email" >
                      </div>         
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="update-user-btn" type="button" class="btn btn-primary">Update User</button>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="modal fade" id="searchUserModal" tabindex="-1" aria-labelledby="searchUserModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="searchUserModalLabel">Search User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="search-name" class="col-form-label">First Name:</label>
                        <input type="text" class="form-control" id="search-name" >
                      </div>
                      <div class="mb-3">
                        <label for="search-lastname" class="col-form-label">Last Name:</label>
                        <input type="text" class="form-control" id="search-lastname" >
                      </div>                                                                                      
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="search-user-button" type="button" class="btn btn-primary">Search User</button>
                  </div>
                </div>
              </div>
            </div>
    ';
}

function loadOrdersContent(){
    return '           
          <div class="page-layout orders-page">
           <ul class="nav flex-column bg-dark" style="width: 15%; align-items: center; position: fixed; height: 100%">
                  <li class="nav-item">
                    <a id="view-all-orders" class="nav-link active" aria-current="page" href="#">
                        <i class="fas fa-list"></i>
                        <span>View All</span>
                    </a>
                  </li>       
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#searchOrderModal">
                        <i class="fas fa-search"></i>
                        <span>Search Order</span>
                    </a>
                  </li>                    
           </ul>
           
            <div class="container-fluid">
                    <div class="row">                       
                        <div class="col-md-12">
                            <div class="table-container" style="margin-left: 15%;">
                                <div class="table-responsive">
                                    <table id="orders-table" class="table table-hover table-striped">
                                      <thead>
                                        <tr>
                                          <th scope="col">Order ID</th>
                                          <th scope="col">User ID</th>
                                          <th scope="col">Full Name</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Address</th>      
                                          <th scope="col">City</th>
                                          <th scope="col">Province</th>
                                          <th scope="col">Zip</th>     
                                          <th scope="col">Total Price</th>
                                          <th scope="col">Order Date</th>
                                        </tr>
                                      </thead>
                                      <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="table-container" style="margin-left: 15%; margin-top: 1%">
                                <div class="table-responsive">
                                    <table id="order-items-table" class="table table-hover table-striped">
                                      <thead>
                                        <tr>
                                          <th scope="col">Order Item ID</th>
                                          <th scope="col">Order ID</th>
                                          <th scope="col">Shoe ID</th>
                                          <th scope="col">Color</th>
                                          <th scope="col">Size</th>      
                                          <th scope="col">Quantity</th>
                                          <th scope="col">Unit Price</th>
                                        </tr>
                                      </thead>
                                      <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                      
                    </div>
            </div>       
           </div> 
           
            <div class="modal fade" id="searchOrderModal" tabindex="-1" aria-labelledby="searchOrderModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="searchOrderModalLabel">Search Order</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="edit-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="edit-name" >
                      </div>
                      <div class="mb-3">
                        <label for="edit-surname" class="col-form-label">Surname:</label>
                        <input type="text" class="form-control" id="edit-surname" >
                      </div>
                      <div class="mb-3">
                        <label for="edit-email" class="col-form-label">E-Mail:</label>
                        <input type="text" class="form-control" id="edit-email" >
                      </div>         
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="update-user-btn" type="button" class="btn btn-primary">Update User</button>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="modal fade" id="productDetailsModal" tabindex="-1" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productDetailsModalLabel">Product Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img id="product-image" src="" alt="Product Image" class="img-fluid">
                                </div>
                                <div class="col-md-6">
                                    <h5>Brand: <span id="product-brand"></span></h5>
                                    <h5>Model: <span id="product-model"></span></h5>
                                    <h5>Size: <span id="product-size"></span></h5>
                                    <h5>Color: <span id="product-color"></span></h5>
                                    <h5>Price: <span id="product-price"></span></h5>
                                    <h5>Gender: <span id="product-gender"></span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    ';
}

if (isset($_POST['page'])){

    $page = $_POST['page'];

    switch ($page) {
        case 'home':
            echo loadHomeContent();
            break;
        case 'products':
            echo loadProductsContent();
            break;
        case 'users':
            echo loadUsersContent();
            break;
        case 'orders':
            echo loadOrdersContent();
            break;
        default:
            echo loadHomeContent();
    }
}