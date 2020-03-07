<?php


//Fech data from DB
function get_data($query){
    $con = mysqli_connect("localhost","root","","citrus-test");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Perform query
    $result = mysqli_query($con, $query);

    while($rows_obav = mysqli_fetch_assoc($result) ){
        
        //Adding data from DB to array
        $get_data[] = $rows_obav;
    }
    return $get_data;
  
    // Free result set
    mysqli_free_result($result);
    mysqli_close($con);

}