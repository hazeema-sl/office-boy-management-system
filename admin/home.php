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
    <title>Home</title>
    <link rel="stylesheet" href="../Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>
<?php include './nav.php'; ?> 
<div class="menu container">
    <div class="row row-cols-2 d-flex align-content-center justify-content-center">
        <div class="col">
            <a class="row row-cols-1 single" href="./user/menu.php">
                <div class="col">
                <img src="../assets/icons/user.svg" alt="" class="img-fluid">
                </div>
                <div class="col">
                    <p>User</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a class="row row-cols-1 single" href="./request/menu.php">
                <div class="col">
                <img src="../assets/icons/order.svg" alt="" class="img-fluid">
                </div>
                <div class="col">
                    <p>Order</p>
                </div>
            </a>
        </div>
        <div class="col">
            <a class="row row-cols-1 single" href="./task/menu.php">
                <div class="col">
                <img src="../assets/icons/task.svg" alt="" class="img-fluid">
                </div>
                <div class="col">
                    <p>Task</p>
                </div>
            </a>
        </div>
    </div>
</div>

</body>
<script>
function checkNotifications() {
    fetch('./fetch_notifications.php')
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                let message = "";
                data.forEach(notification => {
                    message += notification.message ;
                });
                alert("You have new notifications:\n" + message);
                // Optionally, mark them as read
                markAsRead(data);
            }
        });
}

function markAsRead(notifications) {
    notifications.forEach(notification => {
        fetch(`mark_as_read.php?id=${notification.id}`, { method: 'POST' });
    });
}

setInterval(checkNotifications, 5000); // Check every 5 seconds
</script>

</html>