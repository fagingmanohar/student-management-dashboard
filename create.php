<?php
// create.php
require 'csrf.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Add New Student</h1>
    <form action="store.php" method="POST">
        <!-- CSRF Token -->
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

        <!-- Student Details Form -->
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age:</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Grade:</label>
            <input type="text" class="form-control" id="grade" name="grade" required>
        </div>
    
        <div class="mb-3">
            <label for="fees" class="form-label">Fees:</label>
            <input type="number" class="form-control" id="fees" name="fees" required>
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Class:</label>
            <input type="number" class="form-control" id="class" name="class" required>
        </div>
        <div class="mb-3">
            <label for="place" class="form-label">Place:</label>
            <input type="text" class="form-control" id="place" name="place" required>
        </div>
        
        <button type="submit" class="btn btn-success">Add Student</button>
    </form>

    <!-- Link to go back to the student list -->
    <div class="mt-3">
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </div>
</div>
</body>
</html>

