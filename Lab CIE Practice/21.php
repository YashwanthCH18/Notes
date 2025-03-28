<?php
// Display a header for our PHP superglobals demonstration.
echo "<h1>PHP Superglobals Demonstration</h1>";

// 1. $_SERVER: Shows server and execution environment info.
echo "<h2>\$_SERVER</h2>";
echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";

// 2. $_GET: Check if GET data is present.
echo "<h2>\$_GET</h2>";
if (!empty($_GET)) {
    echo "GET Data Received:<br>";
    foreach ($_GET as $key => $value) {
        echo "$key: $value<br>";
    }
} else {
    echo "No GET data received.<br>";
}

// 3. $_POST: Check if POST data is present.
echo "<h2>\$_POST</h2>";
if (!empty($_POST)) {
    echo "POST Data Received:<br>";
    foreach ($_POST as $key => $value) {
        echo "$key: $value<br>";
    }
} else {
    echo "No POST data received.<br>";
}

// 4. $_COOKIE: Set a test cookie and display its value.
echo "<h2>\$_COOKIE</h2>";
if (!isset($_COOKIE['test_cookie'])) {
    setcookie('test_cookie', 'cookie_value', time() + 3600);
    echo "Cookie 'test_cookie' is set. Refresh the page to see its value.<br>";
} else {
    echo "Cookie 'test_cookie': " . $_COOKIE['test_cookie'] . "<br>";
}

// 5. $_FILES: Check if any files were uploaded.
echo "<h2>\$_FILES</h2>";
if (!empty($_FILES)) {
    echo "File uploaded:<br>";
    foreach ($_FILES as $file) {
        echo "File name: " . $file['name'] . "<br>";
    }
} else {
    echo "No file uploaded.<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP GET and POST Methods with Forms</title>
</head>
<body>
    <h1>PHP Forms Using GET and POST</h1>
    
    <!-- Form using GET method -->
    <h2>GET Method Form</h2>
    <form method="GET" action="">
        <label for="get_input">Enter something (GET):</label>
        <input type="text" name="get_input" id="get_input">
        <input type="submit" value="Submit GET">
    </form>

    <!-- Form using POST method -->
    <h2>POST Method Form</h2>
    <form method="POST" action="">
        <label for="post_input">Enter something (POST):</label>
        <input type="text" name="post_input" id="post_input">
        <input type="submit" value="Submit POST">
    </form>

    <!-- File upload form using POST method -->
    <h2>File Upload (POST)</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="file_upload">Upload a file:</label>
        <input type="file" name="file_upload" id="file_upload">
        <input type="submit" value="Upload File">
    </form>
</body>
</html>
