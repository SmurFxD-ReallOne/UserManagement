<?php
require 'db.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $result = $conn->query("SELECT status FROM users WHERE id=$id");
    $currentStatus = $result->fetch_assoc()["status"];
    $newStatus = $currentStatus == 1 ? 0 : 1;
    $conn->query("UPDATE users SET status=$newStatus WHERE id=$id");
}

header("Location: index.php");
exit();
?>
