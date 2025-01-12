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
    
    $msg=$_POST['message'];
    $check=$connection->query("select * from employee where cabin_no='$cabin_no'");
    if($check->num_rows>0){
        $sql="insert into task(employee_name,cabin_no,msg) values('$e_name','$cabin_no','$msg')";
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
    <form action="./menu.php" method="POST">
        <div class="container">
            <h3 class=" text-center mt-4 mb-4 ">Make a request to the Office Boy</h3>
            <div class="row p-4 bg-secondary-subtle border border-primary rounded">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-md-2">
                <div class="col-3">
                    <label for="subject" class="form-label">Message:</label>
                </div>
                <div class="col">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-dark mt-3" name="submit">Submit</button>
    </form>
</body>
</html>