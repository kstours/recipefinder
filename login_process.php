<?php
include("conn.php");

$username = mysqli_real_escape_string($connection, $_POST["username"]);
$password = mysqli_real_escape_string($connection, $_POST["password"]);

$res = mysqli_query($connection, "select * from dbusers where username = '$username'") or die ("Unable to connect to database");
$row = mysqli_fetch_assoc($res);

$error = "";
if ($_POST["username"] == "") {
    $error .= "Username is required</br>";
}

if ($_POST["password"] == "") {
    $error .= "password is required</br>";
}

if ($error != "") {
    include("login.php");
    die();
}


if (password_verify($password, $row['password'])) {
    $_SESSION["userid"] = $row["id"];
    $_SESSION["username"] = $row["username"];
    header("Location: index.php");
} else {

    $error .= "Invalid Username Or Password!</br>";
    include("login.php");
    die();
}
?>