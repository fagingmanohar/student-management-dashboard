<?php
// edit.php
require 'csrf.php';

$mysqli = new mysqli('localhost', 'root', '', 'students_db');

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = intval($_GET['id']);
$stmt = $mysqli->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

if (!$student) {
    echo "Student not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Student</h1>
    <form action="update.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
    
    <!-- your other form fields -->

    <form action="update.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
        <input type="hidden" name="id" value="<?= $student['id'] ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age:</label>
            <input type="number" class="form-control" id="age" name="age" value="<?= htmlspecialchars($student['age']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Grade:</label>
            <input type="text" class="form-control" id="grade" name="grade" value="<?= htmlspecialchars($student['grade']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
           <!-- <input type="text" class="form-control" id="address" name="address" value="<?= htmlspecialchars($student['address']) ?>" required> -->
        </div>
        <div class="mb-3">
            <label for="fees" class="form-label">Fees:</label>
            <input type="number" class="form-control" id="fees" name="fees" value="<?= htmlspecialchars($student['fees']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Class:</label>
            <input type="number" class="form-control" id="class" name="class" value="<?= htmlspecialchars($student['class']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="place" class="form-label">Place:</label>
            <input type="text" class="form-control" id="place" name="place" value="<?= htmlspecialchars($student['place']) ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update Student</button>
    </form>
    <div class="mt-3">
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </div>
</div>
</body>
</html>
