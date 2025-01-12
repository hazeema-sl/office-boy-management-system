<?php
session_start();
if(!isset($_SESSION['adminUsername'])){
  die ("You are not logged in ");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <?php
    include '../config.php';
    if(isset($_POST['submit'])){
        $username=$_POST['userName'];
        $password=$_POST['password'];
        $cabin_no=$_POST['cabin_no'];

        $exist="select * from employee where e_name='$username' and e_password='$password'";
        $result=$connection->query($exist);
        if($result->num_rows>0){
            echo "user already exist";
        }else{
            $addUser="insert into employee(e_name,e_password,cabin_no) values('$username','$password','$cabin_no')";
            $result=$connection->query($addUser);
            echo "user registration successfull";
        }
    }
    ?>
</head>
<body>
<?php include './nav.php'; ?> 
<div class="container">
<form action='./add.php' method="POST">
  <div class="mb-3">
    <label  class="form-label">Employee Name:</label>
    <input type="text" class="form-control" name="userName">
  </div>
  <div class="mb-3">
    <label class="form-label">Cabin No:</label>
    <input type="number" name="cabin_no" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" name="password" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
</body>
</html>