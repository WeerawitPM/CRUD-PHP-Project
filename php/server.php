<?php
$servername = 'localhost';
$username = 'root';
$password = '12345678';
$dbname = 'mydb';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_error()) {
    die("Connection failed" . mysqli_connect_error());
} else {
}
?>