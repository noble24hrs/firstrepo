<?php
    require 'php/master_script.php';
    require 'php/login.php';

    require 'php/addpost.php';

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

        <div class="container mt">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header">
                        <strong> <?php echo $profile['first_name'].' ' .$profile['last_name']
                        ?>  
                        </strong>


                    <?php
                        if(isset($errors) && !empty($errors)){ 
                        ?>
                            <div class="alert alert-danger">
                            
                            <ul class='list-group'>
                            
                                <?php
                                foreach($errors as $error){
                                    ?>
                                    <li class="list group-item">
                                        <?php echo $error ?>
                                    </li>          
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                      <?php
                        }
                    elseif(isset($success)){
                        ?>
                        <div class="alert alert-success"> <?php echo $success ?> </div>
                        <?php
                    }
                    ?>
                    

                     <h4>create post</h4>
                </div>
                    <div class="card-body">
                        <strong> share your thought</strong>
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text"class="form-control" placeholder="ENTER TITLE" name='title'
                                value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''?>">
                            </div>
                            <div class="form-group">
                             <textarea id="" class="form-control mt-1 static" name="content" style="height: 300px"><?php echo isset($_POST['textarea']) ? $_POST['textarea'] : ''?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit"class="btn btn-outline-success btn-lg mt-1" class="form-control "value="POST" name='create_post'>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





        <?php
        require 'components/footer.php'?>

    </body>

    </html>

