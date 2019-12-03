<?php

    //get the type of download
    if(isset($_GET['type'])){
        // echo("set");
        $type = $_GET['type']; //some_value
    }
    // echo($type);
    // used https://makitweb.com/how-to-export-mysql-table-data-as-csv-file-in-php/ as a reference
    // and stackexhange post https://stackoverflow.com/questions/21923934/exporting-table-to-csv-via-php-button

    include_once("./library.php");// To connect to the database
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if($type=='restaurant'){
        $filename = 'restaurants.csv';
        $sql="SELECT name, address, rid FROM `restaurants`";
        $result=mysqli_query($con,$sql);
    }
    else if($type=='reg_deal'){
        $filename = 'regular_deals.csv';
        $sql="SELECT item_name, description, cost, rid, recurs_when FROM `regularDeal`";
        $result=mysqli_query($con,$sql);
    }
    else if($type=='temp_deal'){
        $filename = 'temporary_deals.csv';
        $sql="SELECT item_name, description, cost, rid, start_date, end_date FROM `tempDiscount`";
        $result=mysqli_query($con,$sql);
    }

    if (!$result){
        echo "Something went wrong when retrieving the results.";
        die('Error: ' . mysqli_error($con));
    }
    
    $file = fopen($filename,"w");

    while($row = mysqli_fetch_assoc($result)) {
        fputcsv($file, $row);
    }          
        
    // download
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=".$filename);
    header("Content-Type: application/csv; "); 
    readfile($filename);

    // deleting file
    unlink($filename);
    exit();
    
?>