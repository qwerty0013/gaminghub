<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
require "connection.php";
$import = "SELECT password FROM account where username='$username'";
$records = mysqli_query($conn,$import);
foreach ($records as $record){
  $currentPass=$record['password'];
}
if (isset($_POST['submit'])){
$pass = $_POST['current-password'];
$newPass = $_POST['new-password'];
if (mb_strlen($newPass, 'UTF-8') > 7){
if ($currentPass == $pass){
  $update = "UPDATE account SET password='$newPass' where username='$username'";
  $check = mysqli_query($conn,$update);
  if ($check) {
    echo 'Password Changed Successfully! <br> <a href="./details.php"><button>Return Back</button></a>';
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
    echo ' <br> <a href="./details.php"><button>Return Back</button></a>';
    exit();
}
}
else {
  echo 'Please enter correct current password! <br> <a href="./details.php"><button>Return Back</button></a>';
  exit();
}
}else{
  echo 'Please ensure new character is above 8 characters! <br> <a href="./details.php"><button>Return Back</button></a>';
  exit();
}
}else {
  echo "ok";
}
?>