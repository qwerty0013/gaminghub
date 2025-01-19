<?php
$servername = "localhost";
$database="comproject";
$user="root";
$password="";


$conn=mysqli_connect($servername, $user, $password, $database);


if(!$conn)
{
    die("Connection Failed: ". mysqli_connect_error());
}


