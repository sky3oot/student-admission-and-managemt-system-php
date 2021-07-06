<?php


$servername = "localhost";
$username = "root";
$password = "";
$db = "student_admission";

$cn = mysqli_connect($servername, $username, $password, $db);

$id = $_REQUEST['id'];
$query = "DELETE FROM `admission` WHERE `id`=$id";
$result = mysqli_query($cn, $query) or die(mysqli_error());
header("Location: studentedit.php");