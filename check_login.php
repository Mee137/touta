<?php
require 'config.php';
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['logged_in' => false]);
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();

    if (!$user) {
        session_destroy();
        echo json_encode(['logged_in' => false]);
        exit();
    }

    echo json_encode([
        'logged_in' => true,
        'username' => $_SESSION['username']
    ]);
} catch (PDOException $e) {
    error_log("Session check failed: " . $e->getMessage());
    echo json_encode(['logged_in' => false]);
}
?>