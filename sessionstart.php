<?php
session_start(); 
if (isset($_POST['submit'])) {
function authenticateUser($email, $lock) {
  $sql = "SELECT * from account";
  require "connection.php";
  $records = mysqli_query($conn,$sql);
    foreach($records as $record){
      if ($record['email'] == $email && $record['password'] == $lock ){
        echo 'ok';
        return true;
      }
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lock = $_POST['password'];
    $email = $_POST['email'];
    if (authenticateUser($email, $lock)) {
        require "connection.php";
        $sql = "SELECT * from account";
        $records = mysqli_query($conn,$sql);
        foreach($records as $record){
          if ($record['email'] == $email && $record['password'] == $lock ){
            $_SESSION['username'] = $record['username']; 
            header("Location: ./mainpage.php"); 
            exit();
          }
        }
       
    } else {
        echo 'Invalid email or password <br> <a href="./login.php"><button>Return Back</button></a>'; 
        ;
    }
}
}

?>