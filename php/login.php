<?php
  if(isset($_POST["LOGIN"])){
    $error = null;
    $username =$_POST['username'];
    $password =$_POST['password'];

    $sql =  "SELECT id FROM users WHERE (username = '$username' AND password = '$password')";
    $check = mysqli_query($CONNECTION, $sql);
    if(mysqli_num_rows($check) === 1){// credentials found
        $credential= mysqli_fetch_array($check, MYSQLI_ASSOC);// redirect to homepage
    
        if(isset($_POST['remember_me'])){//if user want to be kept logged in for long time
            setcookie('user_id',$credential['id'],time()+(86400 * 7));//set time stamp
        }else{
            setcookie('user_id',$credential['id'],time()+(86400 * 7));//set time stamp
        }
        header('location: home.php');
    }

else{
    $error ="username or password not match";
}
  }
?>