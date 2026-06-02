<?php
session_start();
header('Content-Type: application/json');

require_once '../config/database.php';

// Get POST data
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Validate inputs
if (empty($email) || empty($password)) {
  echo json_encode(['success' => false, 'message' => 'Email and password required']);
  exit;
}

// Query database for user
$stmt = $conn->prepare('SELECT id, email, password, role, first_name FROM users WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();

  // Verify password
  if (password_verify($password, $user['password'])) {
    // Password is correct, set session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['login_time'] = time();

    echo json_encode(['success' => true, 'message' => 'Login successful']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
}

$stmt->close();
$conn->close();
?>
