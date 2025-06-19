<?php
require '../connection.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute([$id]);
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>User Details</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></li>
        <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></li>
        <li class="list-group-item"><strong>Phone:</strong> <?= htmlspecialchars($user['phone']) ?></li>
        <li class="list-group-item"><strong>Address:</strong> <?= htmlspecialchars($user['address']) ?></li>
    </ul>
    <a href="index.php" class="btn btn-secondary mt-3">Back</a>
</body>
</html>
