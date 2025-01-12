<?php
session_start();

if(!isset($_SESSION['username'])){
    die ("Youre not logged in ");
}

include '../config.php';
$e_name= $_SESSION['username'];
$e_id=$_SESSION['e_id'];
$cabin_no= $_SESSION['cabin_no'];
if(isset($_POST['submit'])){
    $subject=$_POST['subject'];
    $msg=$_POST['message'];
    $drink=$_POST['drink_items'];
    $quantity=$_POST['quantity'];
    $check=$connection->query("select * from employee where cabin_no='$cabin_no'");
    if($check->num_rows>0){
        $sql="insert into request(employee_name,cabin_no,subject,msg,drink_item,quantity) values('$e_name','$cabin_no','$subject','$msg','$drink','$quantity')";
        // When user submits a request
        $message = "New request from Cabin No: $cabin_no"; 
        $sql2 = "INSERT INTO notification (message) VALUES ('$message')";
        mysqli_query($connection, $sql2);
        $result = $connection->query($sql);
        echo "request submitted successfully";
    }
    
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
</head>
<body>
    <?php
    include './nav.php'
    ?>
    <form action="./request.php" method="POST">
        <div class="container">
            <h3 class=" text-center mt-4 mb-4 ">Make a request to the Office Boy</h3>
            <div class="row p-4 bg-secondary-subtle border border-primary rounded">
            <div class="row">
                <div class="col-3">
                    <label for="subject" class="form-label">Subject:</label>
                </div>
                <div class="col">
                <input type="text" name="subject" class="form-control">
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-3">
                    <label for="message" class="form-label">Message:</label>
                </div>
                <div class="col">
                <input type="text" name="message" class="form-control">
                </div>
            </div>
            <div class="row col ">
                <div class="col-3">
                    <label for="drink_items">Drink Items:</label>
                </div>
                <div class="col">
                <select class="form-select" aria-label="" name="drink_items">
                    <option selected value="coffee">Coffee</option>
                    <option value="Tea">Tea</option>
                    <option value="cappuccino">Cappuccino</option>
                    <option value="milk">Milk</option>
                    <option value="coke">Coke</option>
                </select>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-3">
                    <label for="quantity">Quantity:</label>
                </div>
                <div class="col">
                    <input type="number" name="quantity" class="form-control">
                </div>
            </div>
            <div class="row p-3">
            <button type="submit" class="btn btn-outline-dark" name="submit">Submit</button>
        </div>
        </div>
        </div>
    </form>
</body>
</html>