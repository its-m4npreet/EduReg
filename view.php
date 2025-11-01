<?php require 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduReg - All Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>All Registered Students</h1>
        <p style="text-align:center;">
            <a href="index.html" class="btn">Add New Student</a>
        </p>

        <?php if (isset($_GET['msg'])): ?>
            <?php if ($_GET['msg'] == 'success'): ?>
                <p class="success">Student registered successfully!</p>
            <?php elseif ($_GET['msg'] == 'deleted'): ?>
                <p class="success">Student deleted.</p>
            <?php endif; ?>
        <?php endif; ?>

        <?php
        $stmt = $pdo->query("SELECT * FROM students ORDER BY id DESC");
        $count = $stmt->rowCount();
        ?>

        <p><strong>Total Students: <?= $count ?></strong></p>

        <?php if ($count > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Course</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = $stmt->fetch()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= $row['age'] ?></td>
                        <td><?= htmlspecialchars($row['course']) ?></td>
                        <td>
                            <a href="delete.php?id=<?= $row['id'] ?>" 
                               class="delete" 
                               onclick="return confirm('Delete <?= htmlspecialchars($row['name']) ?>?')">
                               Delete
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p style="text-align:center; color:#666; margin-top:30px;">
                No students registered yet.
            </p>
        <?php endif; ?>
    </div>
</body>
</html>