<?php
require 'connection.php';

$sql = "CREATE TABLE snakeDB (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username varchar(50) UNIQUE,
    usertag INT NOT NULL,
    score INT NOT NULL
);";

$data = mysqli_query($conn, $sql);

if ($data) {
    echo "Table created successfully.";
} else {
    echo "Some problem occurred: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
