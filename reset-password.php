<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/forgot.css">
<link rel="stylesheet" type="text/css" href="css/navbar.css">

<?php include('conn.php');
include('navbar.php');
?>
<title>Recipe Finder</title>
<div class="recipe-finder-header">
    <h1>Recipe Finder</h1>
</div>


<div class="forgotBackground">
    <div class="forgotContainer">

        <a href="login.php">
            <img src="img/closeButton.png" alt="closeButton" class="close">
        </a>


        <h1>Forgot Password</h1>
        <div class="errors">
            <?php if (isset($error)) ?>
            <?php echo $error ?><br>
        </div>


        <div class="textBoxes">
            <form action="reset-password-process.php" method="POST">
                Email: <input type="text" name="email"></br></br>
                Code: <input type="text" name="code"></br></br>
                <div class="registerButton">
                    <input type="submit" value="Reset Password">
                </div>
            </form>
        </div>


    </div>
</div>