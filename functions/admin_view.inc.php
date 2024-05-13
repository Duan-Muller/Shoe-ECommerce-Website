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
             <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                        <div class="table-container">
                            <table id="product-table" class="table table-hover table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">First</th>
                                  <th scope="col">Last</th>
                                  <th scope="col">Handle</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>Jacob</td>
                                  <td>Thornton</td>
                                  <td>@fat</td>
                                </tr>
                                <tr>
                                  <th scope="row">3</th>
                                  <td colspan="2">Larry the Bird</td>
                                  <td>@twitter</td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
             </div>
            
            <section id="product-controls">
                <div class="container-fluid">
                    <div class="row">
                        <div id="table-buttons" class="col-md-12 text-center">
                            <button type="button" class="btn btn-secondary">View All</button>
                            <button type="button" class="btn btn-secondary">View Nike</button>
                            <button type="button" class="btn btn-secondary">View Adidas</button>
                            <button type="button" class="btn btn-secondary">View Converse</button>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="add-product">
                <div class="container-fluid">
                    <div class="row" >
                        <div class="col-md-12">
                            <form role="form">
                                <div class="form-group">                                 
                                    <label for="exampleInputEmail1">
                                        Email address
                                    </label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" />
                                </div>
                                <div class="form-group">
                                     
                                    <label for="exampleInputPassword1">
                                        Password
                                    </label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" />
                                </div>
                                <div class="form-group">
                                     
                                    <label for="exampleInputFile">
                                        File input
                                    </label>
                                    <input type="file" class="form-control-file" id="exampleInputFile" />
                                    <p class="help-block">
                                        Example block-level help text here.
                                    </p>
                                </div>
                                <div class="checkbox">
                                     
                                    <label>
                                        <input type="checkbox" /> Check me out
                                    </label>
                                </div> 
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            ';
}

function loadUsersContent(){
    return "<h1> This is the users</h1>";
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