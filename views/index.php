<?php
session_start();
require '../connection.php';

    $search = $_GET['search'] ?? '';

    if ($search) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE name LIKE ? OR email LIKE ?");
        $stmt->execute(["%$search%", "%$search%"]);
        $users = $stmt->fetchAll();
    } else {
        $stmt = $pdo->query("SELECT * FROM users");
        $users = $stmt->fetchAll();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body class="container mt-5">
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= $_SESSION['msg_type'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['message'], $_SESSION['msg_type']); ?>
    <?php endif; ?>
    <a href="index.php" class="btn btn-primary">Home</a>

    <h2 class="mb-4">User List</h2>

    <form method="GET" action="index.php" class="mb-3 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Search by name or email" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        <button type="submit" class="btn btn-outline-primary">Search</button>
    </form>

    <a href="create_form.php" class="btn btn-primary mb-3">Add User</a>
    <table class="table table-bordered">
        <tr>
            <th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['phone']) ?></td>
                <td><?= htmlspecialchars($user['address']) ?></td>
                <td>
                    <a href="edit_form.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="../controllers/delete.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                    <a href="view_user.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
