<?php
    $server="sql109.infinityfree.com";
    $dbusername="if0_38093466";
    $dbpassword="BpyGMDTOOQLxj";
    $dbName="if0_38093466_OMS";

    $connection=mysqli_connect($server,$dbusername,$dbpassword,$dbName);
    if($connection->connect_error){
        die ("Database connection error");
    }

    
?>