<?php
$insert = false;

$server = "localhost";
$username = "root";
$password = "";
$database = "us_trip"; 

$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id']; 
    $name = $_POST['name']; 
    $rating = $_POST['rating'];
    $message = $_POST['message'];

    $sql = "INSERT INTO feedback (user_id, name, rating, message) VALUES ('$user_id', '$name', '$rating', '$message')";
    if (mysqli_query($con, $sql)) {
        $insert = true;
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="feed.css">
</head>
<body>
<button class="home-btn" onclick="window.location.href='index.php';">Home</button>
<div class="container">
    <h1>Give Us Your Feedback</h1>
    
    <?php if ($insert == true): ?>
        <p class="success">Thank you for your feedback!</p>
    <?php endif; ?>
    
    <form action="feedback.php" method="POST">
        <input type="hidden" name="user_id" value="1"> <!-- Assuming user_id is 1 for testing -->

        <label for="name">Your Name:</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" required>

        <label for="rating">Rating:</label>
        <select name="rating" id="rating" required>
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select>
        
        <label for="message">Your Message:</label>
        <textarea name="message" id="message" rows="4" placeholder="Leave a message (optional)"></textarea>
        
        <button type="submit" class="btn">Submit Feedback</button>
    </form>
</div>

</body>
</html>
