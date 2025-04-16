<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "us_trip";

$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
<div class="container">
    <h1>Admin Dashboard</h1>

    
    <div class="dashboard-cards">
        
        <div class="card" onclick="window.location.href='student_details.php'">
            <h2>Student Details</h2>
            <p>View all students who have signed up for the trip.</p>
        </div>

        
        <div class="card" onclick="window.location.href='feedbacks.php'">
            <h2>Feedbacks</h2>
            <p>View the feedbacks submitted by students after the trip.</p>
        </div>
    </div>
</div>

</body>
</html>
