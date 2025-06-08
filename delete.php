<?php
require_once 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

try {
    $stmt = $conn->prepare("DELETE FROM items WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    header("Location: index.php?message=Item+deleted+successfully");
    exit();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>