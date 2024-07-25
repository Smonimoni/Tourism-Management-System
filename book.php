<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You need to log in to book a tour.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $tour_package_id = $_POST['tour_package_id'];

    $stmt = $pdo->prepare('INSERT INTO bookings (user_id, tour_package_id) VALUES (?, ?)');
    $stmt->execute([$user_id, $tour_package_id]);

    $stmt = $pdo->prepare('UPDATE tour_packages SET available_seats = available_seats - 1 WHERE id = ?');
    $stmt->execute([$tour_package_id]);

    echo "Tour booked successfully!";
}
?>
