<?php
require 'db.php';
$users = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Status Toggle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add User</h2>
<form method="POST" action="insert.php">
    Name: <input type="text" name="name" required>
    Age: <input type="number" name="age" required>
    <button type="submit">Submit</button>
</form>

<h2>User Table</h2>
<table>
    <tr><th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th></tr>
    <?php while ($row = $users->fetch_assoc()): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= htmlspecialchars($row["name"]) ?></td>
            <td><?= $row["age"] ?></td>
            <td><?= $row["status"] ?></td>
            <td>
                <a href="toggle.php?id=<?= $row["id"] ?>">
                    <button>Toggle</button>
                </a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
