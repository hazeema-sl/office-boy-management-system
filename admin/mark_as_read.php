<?php
include './config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($connection, "UPDATE notification SET is_read = 1 WHERE id = $id");
}
?>
