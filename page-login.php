<?php require('./templates/header.php'); ?>
<body class="login">
<secttion class="login-section" id="login-section">
    <div class="login">
        <h2 class='text-center'>LOG IN</h2>
        <?php  if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']); } ?>
        <form action="login.php" method="post">
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="password" name="password" id="password" placeholder="Password">
            <button type="submit" name='login'class="submit">Submit</button>
        </form>
    </div><!-- .login --> 
</secttion><!-- #login-section --> 
<?php require('./templates/footer.php'); ?>