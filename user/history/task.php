<?php
session_start();
if(!isset($_SESSION['username'])){
  die ("Youre not logged in ");
}
include './nav.php';
include '../config.php';

$cabin_no=$_SESSION['cabin_no'];
// Fetch images from the database
$sql = "SELECT * FROM task where cabin_no='$cabin_no' ORDER BY task_id DESC"; 
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

    <h1 class="text-center m-5 ">Food Order History</h1>
    <div class="tb-scroll">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Request ID</th>
      <th scope="col">Employee Name</th>
      <th scope="col">Cabin NO</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<th scope='row'>{$row['task_id']}</th>";
            echo "<td>{$row['employee_name']}</td>";
            echo "<td>{$row['cabin_no']}</td>";
            echo "<td>{$row['msg']}</td>";
            echo "</tr>";
        }
    }
    ?>
  </tbody>
</table>
    </div>
    </div>
</body>
</html>