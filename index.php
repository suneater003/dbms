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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $gender = mysqli_real_escape_string($con, $_POST['Gender']);
    $age = intval($_POST['age']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['Phone']);
    $desc = mysqli_real_escape_string($con, $_POST['desc']);

    $sql = "INSERT INTO users (Name, Age, Gender, email, Phone, description, Date)
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";

    if (mysqli_query($con, $sql)) {
        $insert = true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form.</title>
    <link href="https://fonts.google.com/specimen/Roboto?preview.size=8" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    

    <div>
        <button class="admin-login-btn" onclick="window.location.href='admin_login.php'">Admin Login</button>
    </div>

   
    <div>
        <button class="feedback-btn" onclick="window.location.href='feedback.php'">Give Feedback</button>
    </div>

   
    <div class="container">
        <h1>Welcome to SMIT US Trip Form</h1>
        <p>Enter your details to confirm your participation in the trip:</p>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip!</p>";
        }
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="Gender" id="Gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your E-mail">
            <input type="text" name="Phone" id="Phone" placeholder="Enter your Phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>

    <script src="index.js"></script>
</body>
</html>
