<?php

if(isset($_POST['add-product'])){
  
    //Check and validate Title
    if (!empty($_POST['title'])) {
        $title = trim(htmlspecialchars($_POST['title']));	
    }else {
        session_start();
        $_SESSION["message"] = '<h3 class="error-message">Tittle is missing !!!</h3>';
        header('location: /citrus_test/page-admin-products.php');
        exit();
    }

    //Check and validate Description
    if (!empty($_POST['short_desc'])) {
        $short_desc = trim(htmlspecialchars($_POST['short_desc']));	
    }else {
        session_start();
        $_SESSION["message"] = '<h3 class="error-message">Description is missing !!!</h3>';
        header('location: /citrus_test/page-admin-products.php');
        exit();
    }

    //Check and validate Comment
    
    if (!empty($_FILES['image'])) {
        $img = $_FILES["image"]["name"];
        $target_dir = "public/img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));	
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

   
    $con = mysqli_connect("localhost","root","","citrus-test");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    //Inserting data into DB
    $sql = "INSERT INTO products (title, short_desc, image) VALUES ('$title', '$short_desc', '$img')";

    if (mysqli_query($con, $sql)) {
        session_start();
        $_SESSION["message"] = '<h3 class="success-message">Product has been added</h3>';
        header('location: /citrus_test/page-admin-products.php');
       
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    mysqli_close($con);
}



if(isset($_POST['edit-product'])){
    $title = trim(htmlspecialchars($_POST['title']));
    $short_desc = trim(htmlspecialchars($_POST['short_desc']));	
    $img = $_FILES["image"]["name"];	
    $product_id = $_POST['product-id'];

    if (!empty($_FILES['image'])) {
        $target_dir = "public/img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));	
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $con = mysqli_connect("localhost","root","","citrus-test");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //Updating comments data into DB
    $sql = "UPDATE products SET title = '$title', short_desc = '$short_desc', image = '$img' WHERE id = '$product_id' ";
 
    if (mysqli_query($con, $sql)) {
        header('location: /citrus_test/page-admin-products.php');
     
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    mysqli_close($con);
}

if(isset($_POST['delete-product'])){
    $product_id = $_POST['product-id'];
    $con = mysqli_connect("localhost","root","","citrus-test");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //Updating comments data into DB
    $sql = "DELETE FROM products WHERE id = '$product_id' ";

    if (mysqli_query($con, $sql)) {
        header('location: /citrus_test/page-admin-products.php');
        
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    mysqli_close($con);
}