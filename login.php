<?php

if(isset($_POST['login'])){
  
    //Check and validate Username
    if (!empty($_POST['username'])) {
        $username = trim(htmlspecialchars($_POST['username']));	
    }else {
        session_start();
        $_SESSION["message"] = '<h3 class="error-message">Username is missing !!!</h3>';
        header('location: /citrus_test/page-login.php#login-section');
        exit();
    }
    
    
    //Check and validate Password
    if (!empty($_POST['password'])) {
        $password = trim(htmlspecialchars($_POST['password']));	
    }else {
        session_start();
        $_SESSION["message"] = '<h3 class="error-message">Password missing !!!</h3>';
        header('location: /citrus_test/page-login.php#login-section');
        exit();
    }

    $con = mysqli_connect("localhost","root","","citrus-test");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    //Check if user in DB
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0){
        
        session_start();
        $_SESSION["user"] = $username;
        header('location: /citrus_test/page-admin-comments.php');
       
    }else{
        session_start();
        $_SESSION["message"] = '<h3 class="error-message">Wrong username or password !!!</h3>';
        header('location: /citrus_test/page-login.php#login-section');
    }
    
    mysqli_close($con);
}
