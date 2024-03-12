<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_username = $_POST["reg-username"];
    $reg_email = $_POST["reg-email"];
    $reg_password = password_hash($_POST["reg-password"], PASSWORD_DEFAULT);

    // Check if username, email, and password are not empty
    if (empty($reg_username) || empty($reg_email) || empty($_POST["reg-password"])) {
        echo '<script>alert("Harap isi semua kolom untuk mendaftar.");';
        echo 'window.location.href = "mainmenu.php";</script>';
        exit();
    }

    // Check if username or email already exists
    $check_query = "SELECT * FROM dataUserRegister WHERE username = ? OR email = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("ss", $reg_username, $reg_email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // Username or email already exists, redirect with error message
        echo '<script>alert("Username/Email sudah terdaftar. Daftar dengan Username/Email berbeda");';
        echo 'window.location.href = "mainmenu.php";</script>';
        exit();
    } else {
        // Insert new user if username and email are unique
        $insert_query = "INSERT INTO dataUserRegister (username, email, password) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);

        if (!$insert_stmt) {
            // Show alert for registration error
            echo '<script>alert("Error during registration: ' . $conn->error . '");';
            echo 'window.location.href = "mainmenu.php";</script>';
            exit();
        }

        $insert_stmt->bind_param("sss", $reg_username, $reg_email, $reg_password);
        $insert_success = $insert_stmt->execute();

        // Close the statement
        $insert_stmt->close();

        if ($insert_success) {
            // Registration successful, redirect to mainmenu.php
            echo '<script>alert("Akun Kamu sudah terdaftar.");';
            echo 'window.location.href = "mainmenu.php";</script>';
            exit();
        }
    }

    // Close the check statement
    $check_stmt->close();
}
?>
