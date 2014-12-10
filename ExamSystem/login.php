<?php
require("database.php");
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$result = mysqli_query($con,"SELECT * FROM user WHERE username='$username' AND password='$password'");
#$rows = mysql_fetch_assoc($result);
if($result){
    echo '登录成功';
}else{
    echo '登录失败';
}
?>