<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <title>Recipe Finder</title>
</head>
<body>

<?php include('conn.php');
include('navbar.php');
?>

<div class="recipe-finder-header">
    <h1>Recipe Finder</h1>
</div>


<div class="uploadBackground">
    <a href="index.php">
    </a>
    <h1>Upload Recipe</h1>
    <form action="upload_process.php" method="POST" enctype="multipart/form-data">
        <?php if (isset($error)) echo $error; ?>
        <input type="hidden" name="uploaderName" value="<?php echo urldecode($_GET['username']); ?>">


        Image: <input type="file" name="recipe_image" accept="image/*" required><br><br>

        Recipe Name: <input type="text" name="recipe_name" required><br><br>

        Description: <textarea name="description" rows="4" cols="50" required></textarea><br><br>

        Ingredient List: <textarea name="ingredient_list" rows="4" cols="50" required></textarea><br><br>

        Instructions: <textarea name="instructions" rows="4" cols="50" required></textarea><br><br>
        <div class="uploadButton">
            <input type="submit" value="Upload Recipe">
        </div>
    </form>
</div>


</body>
</html>
