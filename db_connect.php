<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// db_connect.php

$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = "nishu28";     // Replace with your MySQL password
$dbname = "zoo_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Optional: Set character set
$conn->set_charset("utf8");

// The connection is now stored in the $conn variable.
?>