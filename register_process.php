<?php

include('conn.php');
$error = "";
if ($_POST["email"] == "") {
    $error .= "Email is required</br>";
}

if ($_POST["username"] == "") {
    $error .= "Username is required</br>";
}

if ($_POST["password"] == "") {
    $error .= "Password is required</br>";
}

if ($_POST["cpassword"] == "") {
    $error .= "Confirm Password</br>";
}

if ($_POST["password"] != $_POST["cpassword"]) {
    $error .= "Passwords Do not Match!</br>";
}

$email = mysqli_real_escape_string($connection, $_POST["email"]);
$username = mysqli_real_escape_string($connection, $_POST["username"]);

$emailCheck = mysqli_query($connection, "SELECT * FROM dbusers WHERE email = '$email'");
$usernameCheck = mysqli_query($connection, "SELECT * FROM dbusers WHERE username = '$username'");

if (mysqli_num_rows($emailCheck) > 0) {
    $error .= "Email already exists</br>";
}

if (mysqli_num_rows($usernameCheck) > 0) {
    $error .= "Username already exists</br>";
}

if ($error != "") {
    include("register.php");
    die();
}

$password = mysqli_real_escape_string($connection, password_hash($_POST["password"], PASSWORD_BCRYPT, ["salt" => "asd;jhkfasdjkhfahsjdklfajklshdflhjkasdf"]));
mysqli_query($connection, "INSERT INTO dbusers (email, username, password) VALUES ('$email', '$username', '$password')") or die("Unable to run query");
header("Location: login.php");

?>
