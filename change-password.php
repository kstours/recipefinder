<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/forgot.css">
<link rel="stylesheet" type="text/css" href="css/navbar.css">

<?php include('navbar.php');
include('conn.php');
$email = urldecode($_GET['email']);
?>
<title>Recipe Finder</title>
<div class="recipe-finder-header">
    <h1>Recipe Finder</h1>
</div>


<div class="forgotBackground">
    <div class="forgotContainer">


        <h1>Change Password</h1>
        <div class="errors">
            <?php if (isset($error)) ?>
            <?php echo $error ?><br>
        </div>


        <div class="textBoxes">
            <form action="change-password_process.php" method="POST">
                <input type="hidden" name="reset_email" value="<?php echo $email; ?>">
                Password:<br>
                <input type="password" name="password"></br></br>
                Confirm Password:
                <input type="password" name="cpassword"></br></br>
                <div class="registerButton">
                    <input type="submit" value="Change Password">
                </div>
            </form>
        </div>


    </div>
</div>