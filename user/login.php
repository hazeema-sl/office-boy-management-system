<?php
session_start();
include "./config.php";

if(isset($_POST['submit'])){
    $userName = $_POST["userName"];
    $userPassword = $_POST["userPassword"];
    $query = "SELECT * FROM employee WHERE e_name='$userName' AND e_password='$userPassword'";
    $result = $connection->query($query);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $_SESSION['username']=$row['e_name'];
            $_SESSION['cabin_no']=$row['cabin_no'];
            $_SESSION['e_id']=$row['e_id'];
        }
        header("Location: ./home.php");
    } else {
        echo "User doesn't exist";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="../Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

    <div class="login"> 
        <div class="container">
            <form action="./login.php" method="post">
                <h2 class="text-center pb-3">User Login</h2>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="un">User Name:</label>
                    </div>
                    <div class="col">
                        <input type="text" name="userName" class="form-control">
                    </div>
                
                </div>
                <div class="row pb-3">
                <div class="col-3">
                        <label for="un">Password:</label>
                    </div>
                    <div class="col">
                        <input type="password" name="userPassword" class="form-control">
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