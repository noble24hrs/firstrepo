<?php
if(isset($_POST['create_post'])){
    $errors = array();
    $title = $_POST['title'];
    $content = $_POST['content'];

    if($title == ''){
        array_push($errors, 'you need the full gist, put something on the content');
    }

    if($content == ''){
        array_push($errors, 'you need to say your mind');
    }
        if(empty($errors)){
            $user_id = $profile['id'];
            $sql = "INSERT INTO posts (user_id,title,content,posted_at) VALUES ($user_id, '$title', '$content',NOW())";
            $execution =mysqli_query($CONNECTION, $sql);
            if(mysqli_affected_rows($CONNECTION) == 1){
                $success = "New Post <strong> $title </strong> added";
            }
    }

}
?>