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
                    <div class="nav-link popup" onclick="myFunction()">Add Products
                       <form class="popuptext" id="myPopup">
                            <div style="padding:10px 20px;">
                                <h3>Please sign in</h3>
                                <label for="un" class="ui-hidden-accessible">Username:</label>
                                <input type="text" name="user" id="un" value="" placeholder="username" data-theme="a">
                                <label for="pw" class="ui-hidden-accessible">Password:</label>
                                <input type="password" name="pass" id="pw" value="" placeholder="password" data-theme="a">
                                <button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">Sign in</button>
                            </div>
                        </form>
                    </div>                 
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Search Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
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
            
            ';
}

function loadUsersContent(){
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
            
            <section id="user-controls">
                <div class="container-fluid">
                    <div class="row">
                        <div id="table-buttons" class="col-md-12 text-center">
                            <button type="button" class="btn btn-secondary">View All</button>
                            <button type="button" class="btn btn-secondary" id="search-user">Search User</button>
                            <button type="button" class="btn btn-secondary" id="update-user">Update User</button>
                            <button type="button" class="btn btn-secondary" id="add-user">Add User</button>
                            <button type="button" class="btn btn-secondary" id="remove-user">Remove User</button>                          
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="search-form" class="form"  style="display: none;">
                <div class="container-fluid">
                    <div class="row" >
                        <div class="col-md-6">
                            <form role="form">
                                <div class="form-group">                                 
                                    <label for="inputBrand">
                                        Name
                                    </label>
                                    <input type="text" class="form-control" id="searchName" />
                                </div>
                                
                                <div class="form-group">                                    
                                    <label for="inputModel">
                                        Surname
                                    </label>
                                    <input type="text" class="form-control" id="searchSurname" />
                                </div>
                                
                                <div class="form-group">                                
                                    <label for="inputSize">
                                        E-Mail
                                    </label>
                                    <input type="email" class="form-control" id="searchEmail" />
                                </div>                                                                                                                                                              
                            </form>
                        </div>
                       <div class="col-md-6 text-right" style="padding-top: 80px">
                            <button type="submit" class="btn btn-secondary">
                                Search
                            </button>
                       </div>         
                    </div>
                </div>
            </section>
            
            <section id="add-form" class="form"  style="display: none;">
                <div class="container-fluid">
                    <div class="row" >
                        <div class="col-md-6">
                            <form role="form">
                                <div class="form-group">                                 
                                    <label for="inputBrand">
                                        Name
                                    </label>
                                    <input type="text" class="form-control" id="searchName" />
                                </div>
                                
                                <div class="form-group">                                    
                                    <label for="inputModel">
                                        Surname
                                    </label>
                                    <input type="text" class="form-control" id="searchSurname" />
                                </div>
                                
                                <div class="form-group">                                
                                    <label for="inputSize">
                                        E-Mail
                                    </label>
                                    <input type="email" class="form-control" id="searchEmail" />
                                </div>             
                                
                                <div class="form-group">                                
                                    <label for="inputSize">
                                        Password
                                    </label>
                                    <input type="text" class="form-control" id="searchEmail" />
                                </div>   
                                                                                                                                                                                 
                            </form>
                        </div>
                       <div class="col-md-6 text-right" style="padding-top: 80px">
                            <button type="submit" class="btn btn-secondary">
                                Search
                            </button>
                       </div>         
                    </div>
                </div>
            </section>
            
            <section id="remove-form" class="form" style="display: none;">
                <div class="container-fluid">
                    <div class="row" >
                        <div class="col-md-6">
                            <form role="form">
                                <div class="form-group">                                 
                                    <label for="inputBrand">
                                        Name
                                    </label>
                                    <input type="text" class="form-control" id="searchName" />
                                </div>
                                
                                <div class="form-group">                                    
                                    <label for="inputModel">
                                        Surname
                                    </label>
                                    <input type="text" class="form-control" id="searchSurname" />
                                </div>
                                
                                <div class="form-group">                                
                                    <label for="inputSize">
                                        E-Mail
                                    </label>
                                    <input type="email" class="form-control" id="searchEmail" />
                                </div>                                                                                                                                                              
                            </form>
                        </div>
                       <div class="col-md-6 text-right" style="padding-top: 80px">
                            <button type="submit" class="btn btn-secondary">
                                Search
                            </button>
                       </div>         
                    </div>
                </div>
            </section>
            
            <script>
            $(document).ready(function (){
                    function hideAllForms(){
                        $(".form").hide();
                    }
                
                    $("#search-user").click(function (){
                        hideAllForms();
                        $("#search-form").toggle();                        
                    });
                    
                    $("#add-user").click(function (){
                        hideAllForms();
                        $("#add-form").toggle();                      
                    });
                    
                })
            </script>
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