<?php

include('conn.php');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $recipeId = $_GET['id'];

    $deleteSql = "DELETE FROM recipes WHERE recipe_id = $recipeId";
    $deleteResult = mysqli_query($connection, $deleteSql);

    if ($deleteResult) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Error deleting recipe: " . mysqli_error($connection);
    }
} else {
    echo "Recipe ID not provided.";
}

mysqli_close($connection);
?>
