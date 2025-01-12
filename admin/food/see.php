<?php
include './nav.php';
include '../config.php';

// Fetch images from the database
$sql = "SELECT * FROM food"; 
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
    <div class=" container">
        <div class="row row-cols-2 row-cols-lg-5">
            
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='col single-card'>";
                        echo "<img src='" . $row['food_image'] . "' alt='Food Image' style='max-width: 200px; margin: 10px;' class='card-image'> ";
                        echo "<h3 class='card-name'> {$row['food_name']}</h3>";
                        echo "<p class='price'>LKR.{$row['food_price']}</p>";
                        echo "<p class='quantity'>Left: {$row['food_quantity']}</p>";
                        echo "</div>";
                    }
                } else {
                    echo "No images found.";
                }
                ?>
            
        </div>
    </div>
</body>
</html>