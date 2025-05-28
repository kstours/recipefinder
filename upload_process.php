<?php

include('conn.php');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $recipe_image = $_FILES["recipe_image"]["name"];
    $recipe_name = $_POST["recipe_name"];
    $description = $_POST["description"];
    $ingredient_list = $_POST["ingredient_list"];
    $instructions = $_POST["instructions"];
    $username = $_POST["uploaderName"];

    $filename_parts = pathinfo($recipe_image);
    $new_filename = $filename_parts['filename'] . '_' . $username . '.' . $filename_parts['extension'];
    $target_dir = "uploads/";
    $target_file = $target_dir . $new_filename;

    move_uploaded_file($_FILES["recipe_image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO recipes (upload_username, recipe_name, description, ingredients, instructions, recipe_image) VALUES ('$username', '$recipe_name', '$description', '$ingredient_list', '$instructions', '$new_filename')";

    echo "SQL Query: $sql";
    $stmt = $connection->prepare($sql);

    if (!$stmt) {
        die("Error in statement preparation: " . $connection->error);
    }

    $stmt->execute();

    if ($stmt->error) {
        die("Error in statement execution: " . $stmt->error);
    }

    if ($stmt->affected_rows > 0) {
        header("Location: my_uploads.php?username=" . urlencode($username));
        exit();
    } else {
        die("Error: No rows affected.");
    }

    $stmt->close();
}

$connection->close();
?>
