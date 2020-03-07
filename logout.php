<?php
    session_start();
    unset($_SESSION['user']);
    header('location: /citrus_test/index.php');