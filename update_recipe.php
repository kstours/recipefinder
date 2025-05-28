<?php

include('conn.php');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipe_id = $_POST["recipe_id"];
    $recipe_image = $_FILES["recipe_image"]["name"];
    $recipe_name = $_POST["recipe_name"];
    $description = $_POST["description"];
    $ingredient_list = $_POST["ingredient_list"];
    $instructions = $_POST["instructions"];
    $username = $_POST["uploaderName"];

    if (!empty($recipe_image)) {
        $filename_parts = pathinfo($recipe_image);
        $new_filename = $filename_parts['filename'] . '_' . $username . '.' . $filename_parts['extension'];
        $target_dir = "uploads/";
        $target_file = $target_dir . $new_filename;

        move_uploaded_file($_FILES["recipe_image"]["tmp_name"], $target_file);

        $sql = "UPDATE recipes SET recipe_name = '$recipe_name', description = '$description', ingredients = '$ingredient_list', instructions = '$instructions', recipe_image = '$new_filename' WHERE recipe_id = $recipe_id";
    } else {
        $sql = "UPDATE recipes SET recipe_name = '$recipe_name', description = '$description', ingredients = '$ingredient_list', instructions = '$instructions' WHERE recipe_id = $recipe_id";
    }


    $stmt = $connection->prepare($sql);

    if (!$stmt) {
        die("Error in statement preparation: " . $connection->error);
    }

    $stmt->execute();

    if ($stmt->error) {
        die("Error in statement execution: " . $stmt->error);
    }

    header("Location: my_uploads.php?username=" . urlencode($username));
    exit();

    $stmt->close();
}

$connection->close();
?>
