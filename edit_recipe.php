<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <title>Edit Recipe</title>
</head>
<body>

<?php
include('conn.php');
include('navbar.php');

?>

<div class="recipe-finder-header">
    <h1>Edit Recipe</h1>
</div>

<div class="uploadBackground">
    <h1>Edit Recipe</h1>
    <?php



    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $recipeId = $_GET['id'];

        $sql = "SELECT * FROM recipes WHERE recipie_id = $recipeId";
        $result = mysqli_query($connection, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            ?>
            <form action="update_recipe.php" method="POST" enctype="multipart/form-data">
                <?php if (isset($error)) echo $error; ?>
                <input type="hidden" name="recipe_id" value="<?php echo $row['recipie_id']; ?>">
                <input type="hidden" name="uploaderName" value="<?php echo $row['upload_username']; ?>">

                Image: <input type="file" name="recipe_image" accept="image/*"><br><br>

                Recipe Name: <input type="text" name="recipe_name" value="<?php echo $row['recipe_name']; ?>"
                                    required><br><br>

                Description: <textarea name="description" rows="4" cols="50"
                                       required><?php echo $row['description']; ?></textarea><br><br>

                Ingredient List: <textarea name="ingredient_list" rows="4" cols="50"
                                           required><?php echo $row['ingredients']; ?></textarea><br><br>

                Instructions: <textarea name="instructions" rows="4" cols="50"
                                        required><?php echo $row['instructions']; ?></textarea><br><br>

                <div class="uploadButton">
                    <input type="submit" value="Update Recipe">
                </div>
            </form>
            <?php
        } else {
            echo "Recipe not found.";
        }
    } else {
        echo "Recipe ID not provided.";
    }

    mysqli_close($connection);
    ?>
</div>

</body>
</html>
