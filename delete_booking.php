<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.html");
    exit;
}

$conn = new mysqli("localhost", "root", "", "taj_hotel");
$id = intval($_GET['id']);
$conn->query("DELETE FROM bookings WHERE id = $id");

header("Location: admin_dashboard.php");
?>
