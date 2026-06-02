<?php
// Simple script to generate the correct password hash for "123456"
// This is needed to set up the database correctly

$password = "123456";
$hash = password_hash($password, PASSWORD_BCRYPT);

echo "Password: " . $password . "\n";
echo "Hash: " . $hash . "\n";
echo "\nUse this hash in the db.sql INSERT statements.\n";
?>
