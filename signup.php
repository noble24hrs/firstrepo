<?php
  require 'php/master_script.php'; //this is how to require connection script.
require 'php/signup.php';
?>
<!-- linking external php script -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIGNUP</title>
    <?php
require 'components/metahead.php';
?>

</head>
<body>
<!-- nav bar stars here -->
<?php
require 'components/nav.php';
?>
<!-- nav bar stars here , however it was linked externally-->


<div class=container>
        <div class='row justify-content-center'>

            <?php
            //  error reporting
            if(isset($error) && !empty($error)){
             ?>
            <div class='col-md-4'>
                <div class='mt-5'>
                    <h4 class="text-center text-danger"> Oops, There are errors</h4>
                    <ul class='list-group'>
                        <?php
                            foreach($error as $e){//loop through error and output them
                                ?>
                                <li class='list-group-item text-danger'> <?php echo $e ?></li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <?php 
            }
             elseif(isset($registered) && $registered == true){
                ?>
                <div class="col-md-4">
                    <div class="alert alert-success">
                    <h1> You have successfully registered!</h1>
                    <h4>Welcome again <strong> <?php echo $firstname ?> </strong></h4>
                    </div>
        
                    <a href="login.php" class="btn btn-success">Login Now</a>
                </div>
                <?php
            }

              if(!isset($registered)){ //if  the registration is not successful yet
            ?>
            <!-- error report script ends here -->
        <div class="col-md-5">
            <div class="bg-white p-3 mt-2">
            <h4 class="text-center">SIGN UP</h4>

                    <form action="<?php $_PHP_SELF ?>" method="post" >
                        <!-- external method of linking php -->
                            <!-- first name -->
                         <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text"class="form-control"placeholder="enter first name" name='first_name'
                                  value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''?>">
                                  <!-- line 89 the above code is how to make a sticky form; using if else statement -->
                         </div>
                            <!-- field last name -->
                            <div class="form-group">
                                <label for="">last Name</label>
                                <input type="text"class="form-control"placeholder="enter last name" name="last_name"
                                value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : ''?>">

                            </div>
                            <!-- field phone number-->

                            <div class="form-group">
                                <label for="">phone</label>
                                <input type="tel"class="form-control"placeholder="enter phone number" name="phone"
                                value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''?>">

                            </div>
                            <!-- field for email-->
                            <div class="form-group">
                                <label for="">email</label>
                                <input type="email"class="form-control"placeholder="enter valid email" name='email'
                                value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>">

                            </div>
                            <!-- field for username -->
                            <div class="form-group">
                                <label for="">user name</label>
                                <input type="text"class="form-control"placeholder="enter user-name" name='user_name'
                                value="<?php echo isset($_POST['user_name']) ? $_POST['user_name'] : ''?>">

                            </div>
                            <!-- field for password -->
                            <div class="form-group">
                                <label for="">password</label>
                                <input type="password"class="form-control"placeholder="enter password" name='password'>
                            </div>
                            <!-- field for password -->
                            <div class="form-group">
                                <label for=""> password</label>
                                <input type="password"class="form-control"placeholder="confirm password" name='confirm_password'>
                            </div>
                            <!-- field for checkbox -->
                            <div class="form-group">
                                <label for=""><input type="checkbox" value='1' name="checkbox"> I accept the terms and Conditions</label>
                            </div>
                            <!-- submit field -->
                            <div class="form-group">
                                <label for=""></label>
                                <input type="submit"class="btn btn-lg btn-primary"value="sign up" name='submit'>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
 </div>
 <?php } 

    ?>
    <!-- field ensds here -->
    <!-- note this form is non sticky form -->
    <?php
    require 'components/footer.php';
    ?>
    </body>
</html>