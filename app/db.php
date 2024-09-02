<?php
session_start();

// Define constants for admin credentials (Consider using environment variables in a real application)
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', '123');

// Function to create a database connection
function connection()
{
    // Database credentials
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'safepass_db';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully"; // Uncomment for debugging
    } catch (PDOException $e) {
        // Log the error and show a generic message
        error_log('Connection failed: ' . $e->getMessage()); // Log error to a file
        echo 'Unable to connect to the database. Please try again later.';
        exit; // Ensure script execution stops
    }

    return $conn;
}

// Function to authenticate user
function authenticate_user($username, $password)
{
    return $username === ADMIN_USERNAME && $password === ADMIN_PASSWORD;
}

// Example usage of authentication function
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (authenticate_user($username, $password)) {
            $_SESSION['authenticated'] = true;
            echo 'Login successful!';
            // Redirect to admin panel or other secure area
            header('Location: admin_panel.php');
            exit;
        } else {
            echo 'Invalid username or password.';
        }
    }
}

// ---------------------- Test
// connection();
