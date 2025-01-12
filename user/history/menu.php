<?php
session_start();
if(!isset($_SESSION['username'])){
    die ("You are not logged in ");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link rel="stylesheet" href="../../Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/menu.css">
    
</head>
<body>
<?php include './nav.php'; ?> 
    
<div class="menu container">
    <div class="row row-cols-2">
        <div class="col">
            <a class="row row-cols-1 single" href="./food_order.php">
                <div class="col">
                <img src="../../assets/icons/food.svg" alt="">
                </div>
                <div class="col">
                    <p>Food Order History</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a class="row row-cols-1 single" href="./task.php">
                <div class="col">
                <img src="../../assets/icons/task.svg" alt="">
                </div>
                <div class="col">
                    <p>Task History</p>
                </div>
            </a>
    </div>
</div>
</body>
</html>