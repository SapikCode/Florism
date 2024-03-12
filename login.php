<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$response = []; // Initialize an array for the response

// Login Logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["log-username"];
    $password = $_POST["log-password"];

    // Query to get user information based on the username
    $query = "SELECT * FROM dataUserRegister WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Login successful, set session
            $_SESSION['log-username'] = $username;
            // Add login data to the dataUserLogin table
            $insertQuery = "INSERT INTO dataUserLogin (id, username, password, last_login) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("iss", $row['id'], $username, $row['password']);
            $insertStmt->execute();
            $insertStmt->close();

            $response['success'] = true;
            $response['redirect'] = 'menutama.php';
            $response['username'] = $username;
            $response['loginSuccess'] = true;
        } else {
            // Incorrect password
            $response['success'] = false;
            $response['message'] = 'Incorrect password';
        }
    } else {
        // Username not found
        $response['success'] = false;
        $response['message'] = 'Username/password not found';
    }

    $stmt->close();
}

// Logout Logic
if (isset($_SESSION['log-username'])) {
    // Get user_id from dataUserRegister based on the currently logged-in username
    $username = $_SESSION['log-username'];
    $query = "SELECT id FROM dataUserRegister WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userRow = $result->fetch_assoc();
    $user_id = $userRow['id'];
    $stmt->close();

    // Update logout time in dataUserLogin
    $updateQuery = "UPDATE dataUserLogin SET last_login = CURRENT_TIMESTAMP WHERE id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("i", $user_id);
    $updateStmt->execute();
    $updateStmt->close();

    // Clear session
    session_unset();
    session_destroy();
    $response['logout'] = true;
}


// Encode the response as JSON and output it
header('Content-Type: application/json');
echo json_encode($response);
exit;
?>
