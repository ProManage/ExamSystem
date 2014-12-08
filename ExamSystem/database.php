<?php
$con = mysqli_connect("localhost", "examsys", "examsys");
// Check connection
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_select_db($con, "examsys");

function check_tables($con)
{
    $result = mysqli_query($con, 'show tables;');
    $tables   = array();
    while ($row = $result->fetch_assoc()) {
        $tables[] = $row;
    }
    if (!in_array("examsys", $tables)) {
        $sql = "CREATE TABLE `examsys`.`user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(128) NOT NULL,
  `role` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC));
";
        mysqli_query($con, $sql);
    }
}

check_tables($con);
?>
