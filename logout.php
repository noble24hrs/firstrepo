<?php
    require 'php/master_script.php';
    if(Isauthenticated()){
        setcookie('user_id','',0);//delete the user cookie
        $loggedOut =true;
    }
    else{
        $loggedOut = false;
    }
    ?>
    <html>
        <head>
            <?php require 'components/metahead.php' ?>
            <title> Logout </title>
        </head>
    <body>
        <?php require 'components/nav.php'?>
        <div class="container">
            <div class="mt-3">

                <?php
                if($loggedOut){
                    ?>
                    <div class="alert alert-success text center">
                        <p> your  are now logged out, see you soon <?php echo $profile['first_name'] ?></p>
                        <a href="login.php" class="btn btn-primary">Login Now</a>
                    </div>
                    <?php
                }

                ?>
            </div>
        </div>
    <?php
require 'components/footer.php'    
?>
</body>

</html>