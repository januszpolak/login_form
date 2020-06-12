<?php

session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userRegistration');

$name = $_POST['user'];
$password = $_POST['password'];

$q = "SELECT * FROM userTable WHERE name = '$name' && password = '$password'";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if ($num == 1) {
  $_SESSION['username'] = $name; //zmienna sesyjna na potrzeby logowania
  header('location:home.php');
} else {
  header('location:index.php');
}
