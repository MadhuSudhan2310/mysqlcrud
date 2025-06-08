<?php
require_once 'db.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

try {
    $stmt = $conn->prepare("SELECT * FROM items 
                          WHERE name LIKE :search 
                          OR description LIKE :search 
                          OR category LIKE :search 
                          ORDER BY created_at DESC");
    $searchTerm = "%$search%";
    $stmt->bindParam(':search', $searchTerm);
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>
    
    <form method="GET" action="search.php">
        <input type="text" name="search" placeholder="Search items..." value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Search</button>
    </form>
    
    <a href="index.php">Back to Full List</a>
    
    <?php if (count($items) > 0): ?>
        <table border="1">
            <!-- Same table structure as index.php -->
            <!-- Copy the table from index.php here -->
        </table>
    <?php else: ?>
        <p>No items found matching your search.</p>
    <?php endif; ?>
</body>
</html>