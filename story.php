<?php
    require 'php/master_script.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $fetch_post =mysqli_query($CONNECTION, "SELECT * FROM posts WHERE  id =$id");
        if(mysqli_num_rows($fetch_post) > 0){
            $post =mysqli_fetch_array($fetch_post, MYSQLI_ASSOC);
            $poster =getUser($post['user_id']);
        }
    }

    //if comments is been submited
    if(isset($_POST['add_comment'])){
        $user_id =$profile['id'];
        $post_id = $post['id'];
        $comment = $_POST['comment'];
        $sql ="INSERT INTO  comment (user_id,post_id,content,commented_at)
                VALUES($user_id, $post_id, '$comment', NOW())";
                $execution =mysqli_query($CONNECTION, $sql);
                if(mysqli_affected_rows ($CONNECTION)== 1){
                    $comment_added =true;
                }

    }
?>

<!DOCTYPE html>
<html lang="en">
   
<head>

    <?php
    require 'components/metahead.php';
    ?>
    <title><?php $post['title'] ?> </title>

</head>

<body>
    <?php require 'components/nav.php' ?>  
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5><?php echo $post['title']?></h5>
                <p class="text-muted">
                posted by: <?php echo $poster['first_name'].' '.$poster['last_name'] ?> at <?php echo $post['posted_at'] ?>
                </p>
            </div>
            <div class="card-body">
                <p><?php echo $post['content'] ?> </p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                    <h5>comments</h5>
                    <div class="card-body">
                        <?php $comments = getComments($post['id']);
                        if(mysqli_num_rows($comments) > 0){
                            ?>
                            <div class="list-group">
                            <?php
                            while($comment =mysqli_fetch_array($comments,MYSQLI_ASSOC)){//loop through the comments
                                ?>
                                <div class="list-group-item">
                                <p> <?php echo $comment['content']?>  </p>
                                </div>
                             <?php
                            }
                            ?>

                            </div>
                            <?php
                        }else{
                          ?>
                          <div class="alert alert-info">
                          There is no comments on <strong> <?php echo $post['title']?> </strong> yet
                          </div> 

                          <p class="text-muted"> Be the first to comment </p>

                          <?php

                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <form action="<?php $_PHP_SELF ?>" method="post">
                        <?php if(isset($comment_added) && $comment_added ==true){
                            ?>
                            <div class="alert alert-succes"> your comment has been published! </div>
                            <?php


                        }
                        ?>

                    <textarea class="form-control static" placeholder="leave your comments here..." name="comment" required></textarea>
                    <input type="submit"class="btn btn-outline-primary btn-lg mt-1" class="form-control "value="Submit Comment" name='add_comment'>
                    </form>
                </div>  
            </div>

        </div>
    </div>


    <?php
   require 'components/footer.php'?>
</body>
</html>
