<?php
require 'csrf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!validateCsrfToken($_POST['csrf_token'])) {
        die("Invalid CSRF token");
    }

    $mysqli = new mysqli('localhost', 'root', '', 'students_db');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    $fees = $_POST['fees'];
    $class = $_POST['class'];
    $place = $_POST['place'];

    $stmt = $mysqli->prepare("INSERT INTO students (name, age, grade, fees, class, place) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisiss", $name, $age, $grade, $fees, $class, $place);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

