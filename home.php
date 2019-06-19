<?php
    require 'php/master_script.php';
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOME</title>
    <?php
    require 'components/metahead.php';
    ?>

</head>
<body>
    <?php
    require 'components/nav.php';
    // Nav bar included
    ?>


<!-- note jquery stays at the bottpm of html script -->
<!-- <script src="js/jquery-3.3.1.min.js"></script> -->
<!-- <script src="js/bootstrap.min.js"></script> -->
    <div class="container-fluid">
    <?php
        if(isAuthenticated() != false){
        ?>
        <div class="jumbotron">
        <h1>Welcome <?php echo $profile['first_name'].' '.$profile['last_name'] ?></h1> 
        <p>Your username is <?php echo $profile['username'] ?></p>
        </div>
        <?php
        }            
        else{
            ?>
        
        <div class="jumbotron">
            <h1>JOIN US TODAY</h1>
            <div class="text-right">
                <a href="login.php" class="btn btn-primary">login</a>
                <a href="signup.php" class="btn btn-success">Signup</a>
            </div>
        </div>
                <?php
        }
        $latestPosts = getLatestPosts();
        if (mysqli_num_rows($latestPosts) >0){
            while($posts =mysqli_fetch_array($latestPosts, MYSQLI_ASSOC)){
                // print_r($posts)
                ?>
                <div class="card mb-1">
                    <div class="card-header">
                        <h5><?php echo $posts['title']?></h5>
                    </div>
                    <div class="card-body">
                        <p><?php echo substr($posts['content'],0,150)?>... <a href="story.php?id=<?php echo $posts['id']?>">read full story</a> </p>
                    </div>
                </div>
                <?php
            }
        }else{
            ?>
            <div class'alert alert-info'>
                No post yet! <br>
                <a href="post.php" class="btn btn-primary"></a> create post
            </div>
        <?php  

        }
        ?>
    </div>
    <?php
    require 'components/footer.php'?>


</body>
</html>