<?php

require "connection.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $username = $_POST['username'];
    $usertag = $_POST['usertag'];
    $password = $_POST['password'];

    $checkEmailQuery = "SELECT * FROM account WHERE email = ?";
    $stmtEmail = mysqli_prepare($conn, $checkEmailQuery);
    mysqli_stmt_bind_param($stmtEmail, "s", $email);
    mysqli_stmt_execute($stmtEmail);
    mysqli_stmt_store_result($stmtEmail);

    $isEmailUnique = mysqli_stmt_num_rows($stmtEmail) === 0;

    $checkUsernameQuery = "SELECT * FROM account WHERE username = ?";
    $stmtUsername = mysqli_prepare($conn, $checkUsernameQuery);
    mysqli_stmt_bind_param($stmtUsername, "s", $username);
    mysqli_stmt_execute($stmtUsername);
    mysqli_stmt_store_result($stmtUsername);

    $isUsernameUnique = mysqli_stmt_num_rows($stmtUsername) === 0;

    if ($isEmailUnique && $isUsernameUnique) {
        $insertQuery = "INSERT INTO account (name, email, dob, username, usertag, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtInsert = mysqli_prepare($conn, $insertQuery);

        mysqli_stmt_bind_param($stmtInsert, "ssssis", $name, $email, $dob, $username, $usertag, $password);

        $check = mysqli_stmt_execute($stmtInsert);

        if ($check) {
            echo "DATA inserted successfully";
            header("Location: http://localhost/comproject/mainpage.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmtInsert);
    } else {
        echo "Use a Different Email ID or Change your Username!";
    }

    
    mysqli_stmt_close($stmtEmail);


    mysqli_stmt_close($stmtUsername);
}

?>
