<?php
include './config.php'; // Include your database connection
$result = mysqli_query($connection, "SELECT * FROM notification WHERE is_read = 0");
$notifications = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($notifications);
?>
