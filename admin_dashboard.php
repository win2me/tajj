<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.html");
    exit;
}

$conn = new mysqli("localhost", "root", "", "taj_hotel");
$result = $conn->query("SELECT * FROM bookings");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard - TAJ Hotel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <h2>Booking Management</h2>
  <a href="admin_logout.php">Logout</a>
  <table border="1" cellpadding="10">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Check-In</th>
      <th>Check-Out</th>
      <th>Room</th>
      <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['email'] ?></td>
      <td><?= $row['checkin'] ?></td>
      <td><?= $row['checkout'] ?></td>
      <td><?= $row['room_type'] ?></td>
      <td><a href="delete_booking.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this booking?')">Delete</a></td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
