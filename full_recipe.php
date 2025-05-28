<?php

include('conn.php');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$recipeId = isset($_GET['id']) ? urldecode($_GET['id']) : null;

$sql = "SELECT * FROM recipes WHERE recipe_id = $recipeId";
$result = mysqli_query($connection, $sql);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/full_recipe.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/navbar.css">
        <title>Full Recipe</title>
    </head>

    <body>

    <header>
        <?php include('navbar.php') ?>
    </header>

    <main>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $recipeName = $row['recipe_name'];
            $description = $row['description'];
            $ingredientList = $row['ingredients'];
            $instructions = $row['instructions'];
            $recipeImage = $row['recipe_image'];

            echo "<h1>$recipeName</h1>";
            echo "<img src='uploads/$recipeImage' alt='$recipeName'>";
            echo "<p>Description: $description</p>";
            echo "<p>Ingredients: $ingredientList</p>";
            echo "<p>Instructions: $instructions</p>";
        } else {
            echo "<p>Recipe not found.</p>";
        }
        ?>

    </main>

    </body>

    </html>

<?php
mysqli_close($connection);
?>