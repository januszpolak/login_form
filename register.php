<?php

session_start();
header('location:index.php');

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userRegistration');

$name = $_POST['user'];
$password = $_POST['password'];

$q = "SELECT * FROM userTable WHERE name = '$name'";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if ($num == 1) {
  header('location:exist.php');
} else {
  $register = "INSERT INTO userTable(name, password) VALUES('$name','$password')";
  mysqli_query($con, $register);
  header('location:reg.php');
}
