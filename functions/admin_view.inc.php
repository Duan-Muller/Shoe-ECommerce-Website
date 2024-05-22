<?php
function loadHomeContent(){
    return '
            <div class="container">
              <p class="container-title" style="color: black">Admin Dashboard</p>
            
              <div class="gradient-cards">
                <div class="card">
                  <div class="container-card bg-green-box">
                    <p class="card-title">Total Orders</p>
                    <p class="card-description">Info here</p>
                  </div>
                </div>
            
                <div class="card">
                  <div class="container-card bg-white-box">
                    <p class="card-title">Total Sales Amount</p>
                    <p class="card-description">Sales - total cost somehow</p>
                  </div>
                </div>
            
                <div class="card">
                  <div class="container-card bg-yellow-box">
                    <p class="card-title">Total Amount of Stock</p>
                    <p class="card-description">Display total somehow</p>
                  </div>
                </div>
            
                <div class="card">
                  <div class="container-card bg-blue-box">
                    <p class="card-title">Total Users</p>
                    <p class="card-description">Display total users</p>
                  </div>
                </div>
              </div>
            </div>';
}

function loadProductsContent(){
    return '     
            <div class="page-layout products-page">
                <ul class="nav flex-column bg-dark" style="width: 15%; align-items: center; position: fixed; height: 100%">
                  <li class="nav-item">
                    <a id="view-all-products" class="nav-link active" aria-current="page" href="#">View All</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</a>    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#searchProductModal">Search Product</a>
                  </li>               
                </ul>
         
                 <div class="container-fluid">
                    <div class="row">                       
                        <div class="col-md-12">
                            <div class="table-container" style="margin-left: 15%;">
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
                                    </tr>
                                  </thead>
                                  <tbody></tbody>
                                </table>
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
            
            ';
}

function loadUsersContent(){
    return '           
          <div class="page-layout users-page">
           <ul class="nav flex-column bg-dark" style="width: 15%; align-items: center; position: fixed; height: 100%">
                  <li class="nav-item">
                    <a id="view-all-users" class="nav-link active" aria-current="page" href="#">View All</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#addUserModal">Edit User</a>    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#searchUserModal">Search User</a>
                  </li>               
                </ul>
           
            <div class="container-fluid">
                    <div class="row">                       
                        <div class="col-md-12">
                            <div class="table-container" style="margin-left: 15%;">
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
            
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="productModalLabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="add-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="add-name" >
                      </div>
                      <div class="mb-3">
                        <label for="add-surname" class="col-form-label">Surname:</label>
                        <input type="text" class="form-control" id="add-surname" >
                      </div>
                      <div class="mb-3">
                        <label for="add-email" class="col-form-label">Size:</label>
                        <input type="text" class="form-control" id="add-email" >
                      </div>
                      <div class="mb-3">
                        <label for="add-password" class="col-form-label">Color</label>
                        <input type="text" class="form-control" id="add-password" >
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
                            
          
    ';
}

function loadOrdersContent(){
    return "<h1> This is the orders</h1>";
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