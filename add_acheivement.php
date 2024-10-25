<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    // Handle image upload
    if ($_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $target = 'images/' . basename($image);
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Insert into the database
            $sql = "INSERT INTO achievements (title, description, image) VALUES ('$title', '$description', '$image')";
            if ($conn->query($sql) === TRUE) {
                echo "New achievement added successfully.";
                header("Location: index.php"); // Redirect back to the index page
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Failed to upload image.";
        }
    }
}
$conn->close();
?>
