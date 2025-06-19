<?php
session_start();
require '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, phone, address) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address']]);
        $_SESSION['message'] = "User created successfully!";
        $_SESSION['msg_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = "Error creating user!";
        $_SESSION['msg_type'] = "danger";
    }
}