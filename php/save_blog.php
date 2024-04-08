<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.html");
    exit();
}

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quillverse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve blog data from the form
$title = $_POST['title'];
$content = $_POST['content'];
$author_id = $_SESSION['user_id']; // Get the author's ID from the session

// Generate blog ID (format: B00000001)
$sql_blog_id = "SELECT CONCAT('B', LPAD(IFNULL(MAX(SUBSTRING(blog_id, 2)), 0) + 1, 8, '0')) AS new_id FROM blogs";
$result_blog_id = $conn->query($sql_blog_id);
$row_blog_id = $result_blog_id->fetch_assoc();
$blog_id = $row_blog_id['new_id'];

// Prepare and execute SQL statement to insert blog data into the database
$sql_insert = "INSERT INTO blogs (blog_id, title, author_id, content, date_created) 
               VALUES ('$blog_id', '$title', '$author_id', '$content', NOW())";

if ($conn->query($sql_insert) === TRUE) {
    echo "Blog saved successfully.";
} else {
    echo "Error: " . $sql_insert . "<br>" . $conn->error;
}

$conn->close();
?>
