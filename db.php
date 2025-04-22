<?php
// db.php
$mysqli = new mysqli("localhost", "root", "", "students_db");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
