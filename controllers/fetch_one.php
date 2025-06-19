<?php
require '../connection.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
    $stmt->execute([$_GET['id']]);
    $user = $stmt->fetch();
    echo json_encode($user);
}
