<?php
//
declare(strict_types=1);

function signup_inputs(){

    if (isset($_SESSION["signup_data"]["firstname"]) && !isset($_SESSION["errors_signup"]["names_taken"])){
        echo '<div class="register-name">
                   <label for="firstname">
                      First Name
                   </label>
                   <input type="text" id="firstname" name="firstname" value="' . $_SESSION["signup_data"]["firstname"]
                            . '"placeholder="First Name" class="form-control"/>
               </div>';
    } else {
        echo '<div class="register-name">
                   <label for="firstname">
                      First Name
                   </label>
                   <input type="text" id="firstname" name="firstname" placeholder="First Name" class="form-control"/>
               </div>';
    }

    if (isset($_SESSION["signup_data"]["lastname"]) && !isset($_SESSION["errors_signup"]["names_taken"])){
        echo '<div class="register-last-name">
                   <label for="lastname">
                        Last Name
                   </label>
                   <input type="text" id="lastname" name="lastname" value="' . $_SESSION["signup_data"]["lastname"]
                            .'"placeholder="Last Name" class="form-control"/>
              </div>';
    } else {
        echo '<div class="register-last-name">
                   <label for="lastname">
                        Last Name
                   </label>
                   <input type="text" id="lastname" name="lastname" placeholder="Last Name" class="form-control"/>
              </div>';
    }

    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"]) &&
        !isset($_SESSION["errors_signup"]["invalid_email"])){
        echo '<div class="register-email">
                   <label for="email">
                        Email address
                   </label>
                   <input type="email" id="email" name="email" value="' . $_SESSION["signup_data"]["email"]
                            .'"placeholder="E-mail" class="form-control"/>
              </div>';
    } else {
        echo '<div class="register-email">
                   <label for="email">
                        Email address
                   </label>
                   <input type="email" id="email" name="email" placeholder="E-mail" class="form-control"/>
              </div>';
    }

    echo '<div class="register-password">
               <label for="pwd">
                   Password
               </label>
               <input type="password" id="password" name="pwd" placeholder="Enter Password" class="form-control"/>
          </div>';

    echo '<div class="register-confirm-password">
               <label for="confirm_password">
                   Confirm Password
               </label>
               <input type="password" id ="confirm_password" name="confirm_password" placeholder="Confirm Password" 
               class="form-control"/>
          </div>';

    unset($_SESSION["signup_data"]["firstname"]);
    unset($_SESSION["signup_data"]["lastname"]);
    unset($_SESSION["signup_data"]["email"]);
}

function check_signup_errors(){

    if (isset($_SESSION["errors_signup"])){
        $errors = $_SESSION["errors_signup"];

        echo "<br>";

        foreach ($errors as $error){
            echo '<p class="form-error">' . $error .'</p>';
        }
        unset($_SESSION["errors_signup"]);

    } else if (isset($_GET["signup"]) && $_GET["signup"] == "success"){
        echo "<br>";
        echo '<p class="form-success" style="color: green">Signup success!</p>';
    }

}