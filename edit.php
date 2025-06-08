<!DOCTYPE html>
<html>
<head>
    <title><?= isset($item) ? 'Edit' : 'Add' ?> Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2><?= isset($item) ? 'Edit' : 'Add New' ?> Item</h2>
        <form method="POST">
            <label>Name:</label>
            <input type="text" name="name" value="<?= isset($item) ? htmlspecialchars($item['name']) : '' ?>" required>
            
            <label>Description:</label>
            <textarea name="description"><?= isset($item) ? htmlspecialchars($item['description']) : '' ?></textarea>
            
            <label>Price:</label>
            <input type="number" step="0.01" name="price" value="<?= isset($item) ? htmlspecialchars($item['price']) : '' ?>" required>
            
            <label>Quantity:</label>
            <input type="number" name="quantity" value="<?= isset($item) ? htmlspecialchars($item['quantity']) : '' ?>" required>
            
            <label>Category:</label>
            <input type="text" name="category" value="<?= isset($item) ? htmlspecialchars($item['category']) : '' ?>">
            
            <label>Status:</label>
            <select name="status">
                <option value="active" <?= isset($item) && $item['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                <option value="inactive" <?= isset($item) && $item['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
            </select>
            
            <button type="submit"><?= isset($item) ? 'Update' : 'Add' ?> Item</button>
            <a href="index.php" class="btn">Back to List</a>
        </form>
    </div>
</body>
</html>