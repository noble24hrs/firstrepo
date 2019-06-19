<?php
require 'modules/connection.php';

function isAuthenticated(){
    if(isset($_COOKIE['user_id'])){
    return $_COOKIE['user_id'];
    }
else {
    return false;
    }
}
    //return the user details from database
function Authenticated(){
    GLOBAL $CONNECTION; //get the connectio instance from the global scope
    $id = IsAuthenticated();
    $profile = null;
    if($id !== false){// if user is logged
        $getProfile = mysqli_query($CONNECTION,"SELECT * FROM users where id = $id");
        if(mysqli_num_rows($getProfile) === 1){
            $profile = mysqli_fetch_array($getProfile, MYSQLI_ASSOC);
        }
    }
  return $profile;
}

function getLatestPosts(){
    GLOBAL $CONNECTION;
    $sql = "SELECT * FROM posts ORDER BY posted_at DESC";
    $posts = mysqli_query($CONNECTION, $sql);
    return $posts;
}

function getUser($id){
    GLOBAL $CONNECTION;
    $user =null;
    $sql = "SELECT * FROM users WHERE id =$id";
    $get_user = mysqli_query($CONNECTION, $sql);
    if(mysqli_num_rows($get_user) > 0){
        $user = mysqli_fetch_array($get_user, MYSQLI_ASSOC);
    }
    return $user;
}
// return comments on a particular
    function getComments($post_id){
        GLOBAL $CONNECTION; 
        $sql = "SELECT * FROM comment  WHERE post_id=$post_id ORDER BY commented_at DESC";
        $comments = mysqli_query($CONNECTION, $sql);
        return $comments;
    }

$profile = Authenticated();
