<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/navbar.css">

<?php include('conn.php');
include('navbar.php');
?>

<title>Recipe Finder</title>
<div class="recipe-finder-header">
    <h1>Recipe Finder</h1>
</div>
<div class="loginBackground">

    <div class="loginContainer">
        <a href="index.php">
            <img src="img/closeButton.png" alt="closeButton" class="close">
        </a>
        <h1>Login</h1>


        <form action="login_process.php" method="POST">
            <?php if (isset($error)) {
                echo $error;
            } ?><br>
            Username: <input type="text" name="username"></br></br>
            Password: <input type="password" name="password"></br></br>


            <div class="loginButton">
                <input type="submit" value="Login">
            </div>


        </form>

        <div class="loginRegister">

            <form action="register.php">


                <div class="registerText">Need an account?</div>
                <input type="submit" value="Register">
            </form>
        </div>
        <div class="loginResetPW">
            <div class="forgotPw">Forgot Password?</div>
            <form action="forgot-password.php">

                <input type="submit" value="Reset Password">
            </form>
        </div>


    </div>


</div>




