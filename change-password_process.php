<?php

include('conn.php');
$email = $_POST['reset_email'];
$error = "";
if ($_POST["password"] == "") {
    $error .= "Password is required</br>";
}

if ($_POST["cpassword"] == "") {
    $error .= "Confirm Password</br>";
}

if ($_POST["password"] != $_POST["cpassword"]) {
    $error .= "Passwords Do not Match!</br>";
}

if ($_POST["reset_email"] == "") {
    $error .= "email not found</br>";
}


if ($error != "") {
    include("change-password.php");
    die();
}
$password = mysqli_real_escape_string($connection, password_hash($_POST["password"], PASSWORD_BCRYPT, ["salt" => "asd;jhkfasdjkhfahsjdklfajklshdflhjkasdf"]));
$res = mysqli_query($connection, "UPDATE dbusers SET password = '$password' WHERE email = '$email'");

if ($res) {
    echo "Password updated successfully!";
} else {
    die("Unable to run query: " . mysqli_error($connection));
}

mysqli_close($connection);
header("Location: logout.php");

