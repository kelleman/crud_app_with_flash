<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Create New User</h2>
    <form action="../controllers/create.php" method="POST">
        <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
        <input type="text" name="phone" placeholder="Phone" class="form-control mb-2">
        <input type="text" name="address" placeholder="Address" class="form-control mb-2">
        <button type="submit" name="save" class="btn btn-success">Save</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</body>
</html>
