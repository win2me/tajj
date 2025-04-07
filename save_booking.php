<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "taj_hotel";

// Connect to MySQL
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$room_type = $_POST['room_type'];

// Insert into DB
$sql = "INSERT INTO bookings (name, email, checkin, checkout, room_type)
        VALUES ('$name', '$email', '$checkin', '$checkout', '$room_type')";

if ($conn->query($sql) === TRUE) {
    echo "Booking successful! Thank you for choosing TAJ Hotel.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
