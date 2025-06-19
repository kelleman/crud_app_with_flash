<?php
require '../connection.php';

$search = $_GET['query'] ?? '';
$stmt = $pdo->prepare("SELECT * FROM users WHERE name LIKE ? OR email LIKE ?");
$stmt->execute(["%$search%", "%$search%"]);
$results = $stmt->fetchAll();
echo json_encode($results);