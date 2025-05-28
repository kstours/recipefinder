<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/index_recipes.css">

    <title>Recipe Finder</title>
</head>

<body>

<header>
    <?php include('conn.php');
    include('navbar.php');
    ?>
</header>

<main>
    <div class="recipe-finder-header">
        <h1>Recipe Finder</h1>
    </div>

    <div class="search-container">
        <form action="index.php" method="GET">
            <label for="searchQuery"></label>
            <input type="text" placeholder="Search recipe name" name="query" id="searchQuery">
            <button type="submit">Search</button>
        </form>
    </div>


    <div class="recipe-container">
        <?php


        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            if (isset($_GET['query'])) {
                $query = mysqli_real_escape_string($connection, $_GET['query']);
                $sql = "SELECT recipe_id, recipe_name, recipe_image FROM recipes WHERE recipe_name LIKE '%$query%'";
            } else {
                $sql = "SELECT recipe_id, recipe_name, recipe_image FROM recipes";
            }

            $result = mysqli_query($connection, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $recipeId = $row['recipe_id'];
                    $recipeName = $row['recipe_name'];
                    $recipeImage = $row['recipe_image'];

                    echo "<div class='recipe-square'>";
                    echo "<a href='full_recipe.php?id=$recipeId'>";
                    echo "<img src='uploads/$recipeImage' alt='$recipeName'>";
                    echo "<h2>$recipeName</h2>";
                    echo "</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No recipes found.</p>";
            }

            mysqli_close($connection);
        }
        ?>
    </div>
</main>

<footer>

</footer>

</body>

</html>
