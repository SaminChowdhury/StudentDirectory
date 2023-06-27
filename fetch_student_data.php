<?php
// Connect to the MySQL database
$host = 'localhost';
$dbName = 'Student_Directory';
$username = 'admin';
$password = 'NaekM_@$t3r';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch the student records from the database
$query = "SELECT * FROM Student_Records";
$stmt = $pdo->query($query);
$studentData = $stmt->fetchAll(PDO::FETCH_ASSOC);



// Return the student data as JSON
header('Content-Type: application/json');
echo json_encode($studentData);

?>
