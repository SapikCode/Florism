<?php
session_start();

// Menghancurkan sesi
session_destroy();

// Mengembalikan respons JSON
header('Content-Type: application/json');

// Menyertakan status logout
echo json_encode(['status' => 'success']);
?>
