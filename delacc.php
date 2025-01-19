<?php
session_start(); 
require "connection.php";
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$account = "DELETE FROM account WHERE username='$username'";
$quiz = "DELETE FROM quizdb WHERE username='$username'";
$snake = "DELETE FROM snakedb WHERE username='$username'";
$check1 = mysqli_query($conn,$account);
$check2 = mysqli_query($conn,$quiz);
$check3 = mysqli_query($conn,$snake);
if ($check1 && $check2 && $check3){
  echo 'Account Deleted Successfully! <br> <a href="./land.php"><button>Return to Home Page</button></a>'; 
}
else {
  echo "Data Deletion Failed!";
}
?>

