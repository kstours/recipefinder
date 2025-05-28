<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/my_recipes.css">
    <title>My Uploads</title>
</head>
<body>

<?php
include('conn.php');
include('navbar.php');
?>

<div class="recipe-finder-header">
    <h1>My Uploads</h1>
</div>

<div class="recipe-container">
    <?php




    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = urldecode($_GET['username']);
    $sql = "SELECT recipe_id, recipe_name, recipe_image FROM recipes WHERE upload_username = '$username'";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $recipeId = $row['recipe_id'];
            $recipeName = $row['recipe_name'];
            $recipeImage = $row['recipe_image'];

            echo "<div class='recipe-item'>";
            echo "<img src='uploads/$recipeImage' alt='$recipeName'>";
            echo "<h2>$recipeName</h2>";
            echo "<div class='buttons'>";
            echo "<a href='edit_recipe.php?id=$recipeId'>Edit</a>";
            echo "<a href='delete_recipe.php?id=$recipeId'>Delete</a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No uploads found.</p>";
    }

    mysqli_close($connection);
    ?>
</div>

</body>
</html>
