<?php

if(isset($_POST['add-comment'])){
  
    //Check and validate Name
    if (!empty($_POST['name'])) {
        $name = trim(htmlspecialchars($_POST['name']));	
    }else {
        session_start();
        $_SESSION["message"] = '<h3 class="error-message">Name is not added !!!</h3>';
        header('location: /citrus_test/index.php#comment-section');
        exit();
    }

    //Check and validate Email
    if (!empty($_POST['email'])) {
        $mail = trim(htmlspecialchars($_POST['email']));	
    }else {
        session_start();
        $_SESSION["message"] = '<h3 class="error-message">Email is not added !!!</h3>';
        header('location: /citrus_test/index.php#comment-section');
        exit();
    }

    //Check and validate Comment
    if (!empty($_POST['comment'])) {
        $comment = trim(htmlspecialchars($_POST['comment']));	
    }else {
        session_start();
        $_SESSION["message"] = '<h3 class="error-message">Comment is not added !!!</h3>';
        header('location: /citrus_test/index.php#comment-section');
        exit();
    }


    $con = mysqli_connect("localhost","root","","citrus-test");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    //Inserting data into DB
    $sql = "INSERT INTO comments (name, email, comment, status) VALUES ('$name', '$mail', '$comment','pending')";

    if (mysqli_query($con, $sql)) {
        session_start();
        $_SESSION["message"] = '<h3 class="success-message">Comment has been added</h3>';
        header('location: /citrus_test/index.php#comment-section');
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    mysqli_close($con);
}

if(isset($_POST['publish-comment'])){
    $comment_id = $_POST['comment-id'];
    $con = mysqli_connect("localhost","root","","citrus-test");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //Inserting data into DB
    $sql = "UPDATE comments SET status = 'public' WHERE id = '$comment_id' ";
 
    if (mysqli_query($con, $sql)) {
        header('location: /citrus_test/page-admin-comments.php');
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
        
    }

    mysqli_close($con);
}

if(isset($_POST['edit-comment'])){
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));	
    $comment = trim(htmlspecialchars($_POST['comment']));	
    $comment_id = $_POST['comment-id'];

    $con = mysqli_connect("localhost","root","","citrus-test");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //Updating comments data into DB
    $sql = "UPDATE comments SET name = '$name', email = '$email', comment = '$comment' WHERE id = '$comment_id' ";
 
    if (mysqli_query($con, $sql)) {
        header('location: /citrus_test/page-admin-comments.php');
     
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    mysqli_close($con);
}

if(isset($_POST['delete-comment'])){
    $comment_id = $_POST['comment-id'];
    $con = mysqli_connect("localhost","root","","citrus-test");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //Updating comments data into DB
    $sql = "DELETE FROM comments WHERE id = '$comment_id' ";

    if (mysqli_query($con, $sql)) {
        header('location: /citrus_test/page-admin-comments.php');
        
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    mysqli_close($con);
}