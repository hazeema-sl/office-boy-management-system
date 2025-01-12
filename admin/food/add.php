<?php
include './nav.php';
include '../config.php';

// Check for form submission
if (isset($_POST['submit'])) {

    $foodName = $_POST["food_name"];
    $foodPrice = $_POST['food_price']; 
    $foodQuantity =$_POST['food_quantity'];

    // Handle file uploads
    $allowedTypes = array('image/jpeg', 'image/png', 'image/gif'); 
    $uploadDir = "../../uploads/"; // Directory to store images

    if (isset($_FILES['food_image']) && !empty($_FILES['food_image']['name'])) {
        $ImageFile = $_FILES['food_image']['name']; 
        $tmpFile = $_FILES['food_image']['tmp_name'];
        $fileType = $_FILES['food_image']['type'];

        // File upload validation
        if ($_FILES['food_image']['error'] === UPLOAD_ERR_OK) {
            if ($_FILES['food_image']['size'] > 10000000) { // 10MB limit (adjust as needed)
                echo "File size exceeds the limit.";
            } elseif (!in_array($fileType, $allowedTypes)) {
                echo "Invalid file type.";
            } else {
                // Generate a unique filename
                $uniqueFilename = uniqid() . "." . pathinfo($ImageFile, PATHINFO_EXTENSION); 
                $targetFile = $uploadDir . $uniqueFilename;

                // Move uploaded file to the designated directory
                if (move_uploaded_file($tmpFile, $targetFile)) {
                    $sql = "INSERT INTO food (image_name, food_image, food_name, food_price, food_quantity) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $connection->prepare($sql);
                    $stmt->bind_param("sssss", $uniqueFilename, $targetFile, $foodName, $foodPrice, $foodQuantity);

                    if ($stmt->execute()) {
                        echo "File submission successful";
                    } else {
                        echo "An error occurred while uploading file: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Error moving uploaded file.";
                }
            }
        } else {
            echo "File upload error: " . $_FILES['food_image']['error'];
        }
    } else {
        echo "No file selected.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Foods</title>
</head>
<body>

<h1>Add Food Item</h1>
    <form action="./add.php" method="post" enctype="multipart/form-data">
        <label for="food_image">Food Image:</label>
        <input type="file" name="food_image" id="foodImage" required><br><br>

        <label for="food_name">Food Name:</label>
        <input type="text" name="food_name" id="food_name" required><br><br>

        <label for="food_quantity">Food Quantity:</label>
        <input type="number" name="food_quantity" id="food_quantity" required><br><br>

        <label for="food_price">Food Price:</label>
        <input type="number" name="food_price" id="food_price" step="0.01" required><br><br>

        <input type="submit" value="Add" name="submit">
    </form>

</body>
</html>