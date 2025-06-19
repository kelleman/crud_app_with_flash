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
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Edit User</h2>
    <form action="../controllers/update.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control mb-2" required>
        <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control mb-2" required>
        <input type="text" name="phone" value="<?= $user['phone'] ?>" class="form-control mb-2">
        <input type="text" name="address" value="<?= $user['address'] ?>" class="form-control mb-2">
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</body>
</html>
