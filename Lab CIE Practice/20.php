<?php
// JSON structure for three favorite courses
$jsonData = '[
  {"course_name": "Web Development", "faculty": "Dr. Smith"},
  {"course_name": "Database Systems", "faculty": "Prof. Johnson"},
  {"course_name": "Operating Systems", "faculty": "Dr. Williams"}
]';

// Decode the JSON string into an associative array
$courses = json_decode($jsonData, true);

// Connect to MySQL (adjust credentials if needed)
// Using the "tests" database instead of "test_db"
$conn = new mysqli("localhost", "root", "", "tests");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the 'courses' table if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    faculty VARCHAR(255) NOT NULL
)";
$conn->query($createTableQuery);



// Insert each course from the JSON structure into the table
foreach ($courses as $course) {
    $course_name = $conn->real_escape_string($course['course_name']);
    $faculty = $conn->real_escape_string($course['faculty']);
    $insertQuery = "INSERT INTO courses (course_name, faculty) VALUES ('$course_name', '$faculty')";
    $conn->query($insertQuery);
}

// Retrieve the table data
$result = $conn->query("SELECT * FROM courses");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Courses and Faculty Details</title>
  <style>
    table { border-collapse: collapse; width: 50%; margin: 20px 0; }
    th, td { border: 1px solid #000; padding: 8px; text-align: left; }
  </style>
</head>
<body>
  <h1>Courses and Faculty Details</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Course Name</th>
      <th>Faculty</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['course_name']; ?></td>
        <td><?php echo $row['faculty']; ?></td>
      </tr>
    <?php } ?>
  </table>

  <h2>Raw JSON Data</h2>
  <pre><?php echo htmlspecialchars($jsonData); ?></pre>
</body>
</html>
<?php
$conn->close();
?>
