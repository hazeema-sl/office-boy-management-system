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
    <title>User List</title>
</head>
<body>
    <?php
        include './nav.php';
        include '../config.php';

        $sql= 'select * from employee';
        $result= $connection->query($sql);

    ?>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">User Name</th>
      <th scope="col">Cabin No</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<th scope='row'>{$row['e_id']}</th>";
            echo "<td>{$row['e_name']}</td>";
            echo "<td>{$row['cabin_no']}</td>";
            echo "</tr>";
        }
    }
    ?>
  </tbody>
</table>


</body>
</html>