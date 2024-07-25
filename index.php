<?php
include 'db.php';

$stmt = $pdo->query('SELECT * FROM tour_packages');
$tour_packages = $stmt->fetchAll();
?>

<h1>Tour Packages</h1>
<ul>
<?php foreach ($tour_packages as $package): ?>
    <li>
        <h2><?php echo htmlspecialchars($package['name']); ?></h2>
        <p><?php echo htmlspecialchars($package['description']); ?></p>
        <p>Price: $<?php echo htmlspecialchars($package['price']); ?></p>
        <p>Available Seats: <?php echo htmlspecialchars($package['available_seats']); ?></p>
        <form method="post" action="book.php">
            <input type="hidden" name="tour_package_id" value="<?php echo $package['id']; ?>">
            <input type="submit" value="Book Now">
        </form>
    </li>
<?php endforeach; ?>
</ul>
