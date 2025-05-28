<?php
session_start();

$error = "";
include('conn.php');
if ($_POST["email"] == "") {
    $error .= "Email is required</br>";
}
if ($_POST["code"] == "") {
    $error .= "Code is required</br>";
}
$email = $_POST["email"];

if (mysqli_connect_errno()) {
    exit();
}
$res = mysqli_query($connection, "select * from dbusers where email = '$email'") or die ("Unable to connect to database");
$row = mysqli_fetch_assoc($res);
if ($_POST["code"] == $row['passwordResetKey']) {
    $encodedEmail = urlencode($email);
    $redirectURL = "change-password.php?email=$encodedEmail";
    header("Location: $redirectURL");

} else {
    $error .= $row['passwordResetKey'];
    $error .= "Code is not valid</br>";

}
if ($error != "") {
    include("reset-password.php");
    die();
}
?>