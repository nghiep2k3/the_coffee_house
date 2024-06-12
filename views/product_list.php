<!-- views/product_list.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product List</title>
</head>

<body>
    <h1>Product List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Description</th>
            <th>Image</th>
        </tr>
        <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product->id; ?></td>
            <td><?php echo $product->name; ?></td>
            <td><?php echo $product->quantity; ?></td>
            <td><?php echo $product->unit_price; ?></td>
            <td><?php echo $product->description; ?></td>
            <td><img src="<?php echo $product->src_img; ?>" alt="<?php echo $product->name; ?>" width="50" height="50">
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="6">No products found</td>
        </tr>
        <?php endif; ?>
    </table>
</body>

</html>