<?php
/**
 * Database Initialization Script
 * Run this once to set up the database with correct password hashes
 * Access it via: http://localhost/project/init.php
 */

require_once 'config/database.php';

// Hash for password "123456"
$hashed_password = password_hash('123456', PASSWORD_BCRYPT);

echo "<h2>Database Initialization</h2>";

// Clear existing users
$clearSQL = "DELETE FROM users";
if ($conn->query($clearSQL) === TRUE) {
    echo "<p style='color: green;'>✓ Cleared existing users</p>";
} else {
    echo "<p style='color: red;'>✗ Error clearing users: " . $conn->error . "</p>";
}

// Insert test users with correct hash
$users = [
    ['admin@gmail.com', 'admin', 'John', 'Admin'],
    ['sales@gmail.com', 'sales', 'Sarah', 'Sales'],
    ['warehouse@gmail.com', 'warehouse', 'Mike', 'Warehouse']
];

foreach ($users as $user) {
    $email = $user[0];
    $role = $user[1];
    $first_name = $user[2];
    $last_name = $user[3];

    $sql = "INSERT INTO users (email, password, role, first_name, last_name) 
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $email, $hashed_password, $role, $first_name, $last_name);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>✓ Created user: " . htmlspecialchars($email) . "</p>";
    } else {
        echo "<p style='color: red;'>✗ Error creating user: " . $conn->error . "</p>";
    }
}

echo "<hr>";
echo "<h3>Test Credentials:</h3>";
echo "<p><strong>Email:</strong> admin@gmail.com | <strong>Password:</strong> 123456</p>";
echo "<p><strong>Email:</strong> sales@gmail.com | <strong>Password:</strong> 123456</p>";
echo "<p><strong>Email:</strong> warehouse@gmail.com | <strong>Password:</strong> 123456</p>";
echo "<hr>";
echo "<p><a href='index.html'>Go to Login Page</a></p>";

$conn->close();
?>
