<?php
include 'db.php';

$id = $_GET['id'];

// Prepare the SQL statement to prevent SQL injection
$sql = "DELETE FROM students WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute() === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();

// Redirect to the index page
header("Location: index.php");
exit(); // Ensure no further code is executed after the redirect

// Close the connection
$conn->close();
?>
