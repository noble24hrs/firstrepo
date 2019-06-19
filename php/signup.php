<?php


if(isset($_POST["submit"])){//if form is submitted
    $error = array();//initialilizing error arrays to collect errors

    // retrieving the form data
    $firstname =$_POST['first_name'];
    $lastname =$_POST['last_name'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $username =$_POST['user_name'];
    $password =$_POST['password'];
    $password_ =$_POST['confirm_password'];
    // $submit =$_POST['submit'];

    //validate the firstname
    if($firstname == ''){
        array_push($error, "first name should be filed");
    }

    //validate the firstname
    if($lastname == ''){
        array_push($error, "last name should be filed");
    }
    
    //validate the phone 
       if($phone == ''|| !is_numeric($phone)){
        array_push($error, "invalid phone number");
 
       }
    //validate the username
    if($username ==''){
        array_push($error, "username should be filled");
    }
    else{
        // checking if the username already exist
        $checkForUsername =mysqli_query($CONNECTION, "SELECT username FROM users WHERE(username ='$username')");
        if(mysqli_num_rows($checkForUsername) > 0){//If the username already exist execute these programm
         array_push($error,"The username <strong>$username </strong> Sorry,is already taken!");
        }
  
    }
    

    //validate the email
    if($email == '' || !filter_var($email,FILTER_VALIDATE_EMAIL)){
        array_push($error, "invalid email");
    }
    else{
        $checkForEmail =mysqli_query($CONNECTION, "SELECT email FROM users WHERE(email ='$email')");
        if(mysqli_num_rows($checkForEmail) > 0){// checking if the email already exist
         array_push($error,"The email <strong>$email</strong> Sorry,is already exist!");
        }
    }

    //confirm password match
    if($password == ''){
        array_push($error, "enter prefered password");
    }
    else{

    if($password !=$password_){
        array_push($error, "password do not match");
        }

    }

    if(empty($error)){ //if there are no errors
        //everything is fine we can proceed in data addinng to database


        $sql = "INSERT INTO users (first_name,last_name,email,password,username,phone,registered_at)
        VALUES('$firstname','$lastname','$email','$password','$username','$phone',NOW())";

        // executing query in mysql database
        $execution =mysqli_query($CONNECTION,$sql);
        if(mysqli_affected_rows($CONNECTION) === 1){//check if the insert query was succesful
            $registered =true;
        }

    }


}

?>