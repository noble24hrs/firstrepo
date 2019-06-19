<?php
    require 'php/master_script.php';
    require 'php/login.php';
    ?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>LOGIN</title>
    <?php
require 'components/metahead.php';
?>

</head>
<body>

     <?php require 'components/nav.php' ?>  
     <!-- line 14 the navigation bar is linked -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="bg-white p-3 mt-5 shadow-lg rounded">
                <?php if (isAuthenticated() ===false){ ?>
                    <h4 class="text-center">LOGIN</h4>
                
                    <?php
                        if(isset($error) && $error !==null){
                            ?>
                            <div class="alert alert-danger"> <?php echo $error ?>
                            </div>
                            <?php
                        }
                        ?>
                    <form action="<?php $_PHP_SELF ?>" method="POST">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text"class="form-control"placeholder="enter username" name='username' required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password"class="form-control"placeholder="enter password" name='password' required>
                        </div>
                        <div class="form-group">
                                <label for=""></label>
                                <input type="submit"class="btn btn-lg btn-primary"value="LOGIN" name='LOGIN'>
                                
                               <div class="mt-1 ml-1"> <a href="signup.php" class="btn btn-lg btn-primary">SIGNUP </a></div>
                        </div>

                    </form>
                    <?php
                    }
                    else{
                        ?>
                        <div class="jumbotron">
                        <h4> Altready Logged In </h4>
                        </div>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <!-- JQUERY BOOTSTRAP -->
    <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
    <!-- JS BOOTSTRAP -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <?php
    require 'components/footer.php';
    ?>
 


    
</body>
</html>