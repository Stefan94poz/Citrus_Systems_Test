<?PHP require_once('functions.php'); if(!session_start()){ session_start();} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citrus Test</title>
    <link rel="stylesheet" type="text/css" href='<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/public/css/main.css';?>'>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Oxygen&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9690220c47.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS and JS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <!-- Custom JS-->
    <script src='<?php echo dirname($_SERVER['SCRIPT_NAME']) . '/public/js/main.js';?>'></script>
</head>
<body>
<header>
    <nav>
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if(!isset($_SESSION['user'])):?>
                    <li><a href="page-login.php">Login</a></li>
                <?php endif;?>
                <?php if(isset($_SESSION['user'])):?>
                    <li><a href="logout.php">Log out</a></li>
                    <li><a href="page-admin-comments.php">Admin panel</a></li>
                <?php endif;?> 
               
               
            </ul>
        </div>
    </nav>
</header>
<main id="main" class="container-fluid"> 
    