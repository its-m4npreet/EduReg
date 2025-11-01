<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = strtolower(trim($_POST['email']));
    $age = (int)$_POST['age'];
    $course = $_POST['course'];

    // Server-side validation
    if (strlen($name) < 2) {
        die("Name too short.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email.");
    }
    if ($age < 16 || $age > 100) {
        die("Age must be 16–100.");
    }
    if (empty($course)) {
        die("Select a course.");
    }

    try {
        $sql = "INSERT INTO students (name, email, age, course) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $age, $course]);

        // Redirect to view with success
        header("Location: view.php?msg=success");
        exit;
    } catch (Exception $e) {
        if ($e->getCode() == 23000) { // Duplicate email
            die("Error: Email already registered.");
        }
        die("Error: " . $e->getMessage());
    }
}
?>