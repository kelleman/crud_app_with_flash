<?php
session_start();
require '../connection.php';

if (isset($_GET['id'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id=?");
        $stmt->execute([$_GET['id']]);
        $_SESSION['message'] = "User deleted successfully!";
        $_SESSION['msg_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = "Error deleting user!";
        $_SESSION['msg_type'] = "danger";
    }
    header("Location: ../views/index.php");
    exit();
}
