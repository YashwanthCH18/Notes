<?php
// Start the session
session_start();

// ------------------------
// Sessions
// ------------------------
// Check if a session variable for visits exists; if not, initialize it.
if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 0;
}
$_SESSION['visits']++;  // Increment visit count

// ------------------------
// Cookies
// ------------------------
// Set a cookie named 'username' if it does not already exist.
// The cookie will expire in 1 hour.
if (!isset($_COOKIE['username'])) {
    setcookie('username', 'John Doe', time() + 3600, '/');
}

// Retrieve the cookie value (if it exists)
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : "Cookie not set yet.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cookies and Sessions Demo</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .info { background-color: #f9f9f9; padding: 10px; border: 1px solid #ccc; }
  </style>
</head>
<body>
  <h1>Cookies and Sessions Demo</h1>
  <div class="info">
    <h2>Session Information</h2>
    <p>This page has been loaded <strong><?php echo $_SESSION['visits']; ?></strong> time(s) during this session.</p>
  </div>

  <div class="info">
    <h2>Cookie Information</h2>
    <p>The value of the <strong>username</strong> cookie is: <strong><?php echo $username; ?></strong></p>
    <p>(The cookie is set to expire in 1 hour.)</p>
  </div>
</body>
</html>
