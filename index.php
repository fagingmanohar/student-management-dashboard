<?php
// index.php
require 'csrf.php';

// Fetch students from the database
$mysqli = new mysqli('localhost', 'root', '', 'students_db');
$result = $mysqli->query("SELECT * FROM students");
$students = $result->fetch_all(MYSQLI_ASSOC);
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Student Management Dashboard</h1>
    <a href="create.php" class="btn btn-primary mb-3">Add New Student</a>
    <div class="row">
        <?php foreach ($students as $student): ?>
            <div class="col-md-4 mb-3">
                <div class="card p-3 bg-light rounded">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($student['name']) ?></h5>
                        <p class="card-text">
                            <strong>Age:</strong> <?= htmlspecialchars($student['age']) ?><br>
                            <strong>Grade:</strong> <?= htmlspecialchars($student['grade']) ?><br>
                            <strong>Class:</strong> <?= htmlspecialchars($student['class']) ?><br>
                            <strong>Place:</strong> <?= htmlspecialchars($student['place']) ?>
                        </p>
                        <div class="d-flex justify-content-between">
                            <a href="edit.php?id=<?= $student['id'] ?>" class="btn btn-warning">Edit</a>
                            <form action="delete.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
    <input type="hidden" name="id" value="<?= $student['id'] ?>">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <button type="submit" class="btn btn-danger">Delete</button>
</form>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<footer class="text-center mt-5 py-4 bg-light">
        <p>Website created by <a href="https://fagingmanohar.github.io/portfolio/" target="_blank"><strong>Fagin G Manohar</strong></a></p>
    </footer>
</body>
</html>
