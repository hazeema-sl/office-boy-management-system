<?php

include "./config.php";
if(isset($_POST['submit'])){
    $adminUserName = $_POST["adminUserName"];
    $adminPassword = $_POST["adminPassword"];

    $query = "SELECT * FROM admin WHERE uName='$adminUserName' AND uPassword='$adminPassword'";
    $result = $connection->query($query);

    if($result->num_rows > 0){
        // Set a session variable to indicate successful login
        session_start(); 
        $_SESSION['isLoggedIn'] = true; // Or any other appropriate session variable name
        while($row = $result->fetch_assoc()) {
            $_SESSION['adminUsername']=$row['uName'];
        }
        header("Location: home.php"); 
        exit; 
    } else {
        echo "User doesn't exist";
    }
}else
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

    <div class="login"> 
        <div class="container">
            <form action="./login.php" method="post">
                <h2 class="text-center pb-3">Admin Login</h2>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="un">User Name:</label>
                    </div>
                    <div class="col">
                        <input type="text" name="adminUserName" class="form-control">
                    </div>
                
                </div>
                <div class="row pb-3">
                <div class="col-3">
                        <label for="un">Password:</label>
                    </div>
                    <div class="col">
                        <input type="password" name="adminPassword" class="form-control">
                    </div>
                </div>
                <div class="row ps-2 pe-2 pt-4 pb-4">
                <button class="btn btn-primary" type="submit" name="submit">login</button>
                </div>
            </form>
        </div>
    </div>    
</body>
<script src="../Bootstrap/dist/js/bootstrap.js"><script>
</html>