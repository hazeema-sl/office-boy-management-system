<?php
session_start();
if(!isset($_SESSION['adminUsername'])){
    die ("You are not logged in ");
}
include './nav.php';
include '../config.php';

// Fetch images from the database
$sql = "SELECT * FROM task ORDER BY task_id DESC"; 
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foods</title>
    <link rel="stylesheet" href="../../css/card.css">
    

</head>
<body>

    <h1 class="text-center m-5 ">Food Details</h1>
    <div class="tb-scroll">
    <table class="table table-striped table-hover">
    <thead>
    <tr>
      <th scope="col">Request ID</th>
      <th scope="col">Employee Name</th>
      <th scope="col">Cabin NO</th>
      <th scope="col">Message</th>
      <th></th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
            <th scope='row'>{$row['task_id']}</th>
            <td>{$row['employee_name']}</td>
            <td>{$row['cabin_no']}</td>
            <td>{$row['msg']}</td>
            <td>
            <form action='./delete.php' method='post' style='display:inline;'>
                 <input type='hidden' name='id' value='{$row['task_id']}'>
                 <button type='submit' name='delete' style='border:none; background:none;'>
                 <img class='remove' src='../../assets/icons/delete.svg' alt='Delete'/>
                </button>
            </form>
            </td>
            </tr>";
        }
    }
    ?>
  </tbody>
</table>
    </div>
    </div>
</body>
</html>