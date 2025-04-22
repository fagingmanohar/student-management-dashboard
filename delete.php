<?php
require 'csrf.php';

if (!validateCsrfToken($_POST['csrf_token'])) {
    die('Invalid CSRF token');
}

$mysqli = new mysqli('localhost', 'root', '', 'students_db');

if ($mysqli->connect_error) {
    die('Connection Failed: ' . $mysqli->connect_error);
}

$id = $_POST['id'];

$stmt = $mysqli->prepare("DELETE FROM students WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
