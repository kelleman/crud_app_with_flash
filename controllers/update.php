<?php
session_start();
require '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("UPDATE users SET name=?, email=?, phone=?, address=? WHERE id=?");
        $stmt->execute([$_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['id']]);
        $_SESSION['message'] = "User updated successfully!";
        $_SESSION['msg_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = "Error updating user!";
        $_SESSION['msg_type'] = "danger";
    }
    header("Location: ../views/index.php");
    exit();
}
