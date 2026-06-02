<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: ../index.html');
  exit;
}

// Optional: Check session timeout (30 minutes)
$timeout = 1800; // 30 minutes
if (time() - $_SESSION['login_time'] > $timeout) {
  session_destroy();
  header('Location: ../index.html?timeout=1');
  exit;
}

// Update last activity time
$_SESSION['login_time'] = time();
?>
