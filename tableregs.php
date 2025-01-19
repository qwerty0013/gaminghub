<?php
require 'connection.php';

$sql = "CREATE TABLE account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(50) NOT NULL,
    email varchar(255) NOT NULL,     
    dob DATE NOT NULL,
    username varchar(50) UNIQUE,
    usertag INT NOT NULL,
    password VARCHAR(255) NOT NULL
);";

$data = mysqli_query($conn, $sql);

if ($data) {
    echo "Table created successfully.";
} else {
    echo "Some problem occurred: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
