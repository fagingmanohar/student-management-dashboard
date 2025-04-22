<?php
// update.php
session_start();
require 'db.php'; // assuming you have db connection here
require 'csrf.php';

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// CSRF Token validation
if (!validateCsrfToken($_POST['csrf_token'])) {
    die('Invalid CSRF token!');
}

// Check if all expected fields exist in the POST request
if (
    isset($_POST['id'], $_POST['name'], $_POST['age'], $_POST['grade'], 
          $_POST['fees'], $_POST['class'], $_POST['place'])
) {
    $id     = $_POST['id'];
    $name   = $_POST['name'];
    $age    = $_POST['age'];
    $grade  = $_POST['grade'];
    $fees   = $_POST['fees'];
    $class  = $_POST['class'];
    $place  = $_POST['place'];

    // Prepare the SQL update query
    $stmt = $mysqli->prepare("UPDATE students SET name=?, age=?, grade=?, fees=?, class=?, place=? WHERE id=?");

    if ($stmt) {
        $stmt->bind_param("sisissi", $name, $age, $grade, $fees, $class, $place, $id);

        if ($stmt->execute()) {
            header("Location: index.php?msg=Student+updated+successfully");
            exit();
        } else {
            echo "Execute failed: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Prepare failed: " . $mysqli->error;
    }

    $mysqli->close();
} else {
    echo "All form fields are required.";
}
?>
