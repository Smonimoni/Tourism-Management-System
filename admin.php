<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $available_seats = $_POST['available_seats'];

    $stmt = $pdo->prepare('INSERT INTO tour_packages (name, description, price, available_seats) VALUES (?, ?, ?, ?)');
    $stmt->execute([$name, $description, $price, $available_seats]);

    echo "Tour package added successfully!";
}

$tour_packages = $pdo->query('SELECT * FROM tour_packages')->fetchAll();
?>

<h1>Admin - Manage Tour Packages</h1>
<form method="post">
    Name: <input type="text" name="name" required><br>
    Description: <textarea name="description" required></textarea><br>
    Price: <input type="number" name="price" step="0.01" required><br>
    Available Seats: <input type="number" name="available_seats" required><br>
    <input type="submit" value="Add Package">
</form>

<h2>Existing Packages</h2>
<ul>
<?php foreach ($tour_packages as $package): ?>
    <li>
        <h3><?php echo htmlspecialchars($package['name']); ?></h3>
        <p><?php echo htmlspecialchars($package['description']); ?></p>
        <p>Price: $<?php echo htmlspecialchars($package['price']); ?></p>
        <p>Available Seats: <?php echo htmlspecialchars($package['available_seats']); ?></p>
    </li>
<?php endforeach; ?>
</ul>
