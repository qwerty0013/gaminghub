<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$playername = $_SESSION['username'];
require "connection.php";

if (isset($_POST['submit'])) {
    $score = $_POST['final-score'];
    $checkPastScore = "SELECT * FROM quizdb WHERE username = '$playername'";
    $checkResult = mysqli_query($conn,$checkPastScore);
    if ($checkResult -> num_rows >0){
      $updateQuery = "UPDATE quizdb SET score=$score where username = '$playername'";
      $conn->query($updateQuery);
      echo "Score updated successfully for $playername";
      header("Location: http://localhost/comproject/quiz.php");
      exit();
    } else {
      $sql = "SELECT * FROM account where username = '$playername'";
      $records = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($records);
      if ($count >0){
        foreach($records as $record){
          $usertag = $record['usertag'];
        }
      }else {
        echo "No Account Info Found!";
      }
      $insert = "INSERT INTO quizdb (username, usertag, score)
      VALUES ('$playername','$usertag','$score');";
      $check =  mysqli_query($conn,$insert);
      if ($check){
        echo "Score Registered Successfully!";
        header("Location: http://localhost/comproject/games/quiz.php");
        exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
      }
  }
  
    