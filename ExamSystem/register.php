<?php
require("database.php");
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$result = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");
if (mysqli_num_rows($result) != 0)
    die("用户已经存在");
//mysqli_query($con,"INSERT INTO user(username,password) VALUES ('$username','$password')");
$sql = "INSERT INTO user(username,password,role) VALUES ('$username','$password','student')";
if (mysqli_query($con, $sql)) {
    echo "注册成功";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
?>
