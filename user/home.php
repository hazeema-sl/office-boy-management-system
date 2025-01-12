<?php
session_start();
if(!isset($_SESSION['username'])){
   
    die ("Login as a user. Youre not logged in ");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/menu.css">
    

</head>
<body>
<?php 
include './nav.php'; 

?> 
<div class="menu container">
    <div class="row row-cols-2 d-flex justify-content-center align-content-center">
        <div class="col">
            <a class="row row-cols-1 single" href="./request/request.php">
                <div class="col">
                <img src="../assets/icons/order.svg" alt="" class="img-fluid">
                </div>
                <div class="col">
                    <p>Order</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a class="row row-cols-1 single" href="./history/menu.php">
                <div class="col">
                <img src="../assets/icons/history.svg" alt="history icon" class="img-fluid">
                </div>
                <div class="col">
                    <p>History</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a class="row row-cols-1 single" href="./task/menu.php">
                <div class="col">
                <img src="../assets/icons/task.svg" alt="" class="img-fluid">
                </div>
                <div class="col">
                    <p>Daily Task</p>
                </div>
            </a>
        </div>
    </div>
</div>

</body>
</html>