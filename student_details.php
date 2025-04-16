<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "us_trip";

$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT id, name, age, gender, email, phone, description, date FROM users ORDER BY date DESC";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="student.css">
</head>
<body>
<button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
<button class="back-to-dashboard-btn" onclick="window.location.href='admin_dashboard.php'">Dashboard</button>
<div class="container">
    <h1>Student Details</h1>

    <table class="student-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Description</th>
            <th>Date</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['date']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>

<?php
mysqli_close($con);
?>
