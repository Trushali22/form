<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hardcoded credentials (replace with your actual validation logic)
    $user = [
        'email' => 'admin@gmail.com',
        'password' => 'admin'
    ];

    if ($email === $user['email'] && $password === $user['password']) {
        // Set session variables for successful login
        $_SESSION['email'] = $email;

        // Return JSON response with redirection URL
        echo json_encode(['redirect' => 'dashboard.php']);
    } else {
        // Return JSON response with error message
        echo json_encode(['message' => 'Invalid email or password.']);
    }
}
