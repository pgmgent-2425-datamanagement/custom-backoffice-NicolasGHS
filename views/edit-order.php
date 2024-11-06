<h1 class="text-xl font-bold mb-4">Bestelling Bewerken</h1>

<form action="/orders/update/<?php echo $order->getOrderId(); ?>" method="POST">
    <label for="user_id">Gebruiker ID:</label>
    <input type="number" name="user_id" id="user_id" value="<?php echo htmlspecialchars($order->getUserId()); ?>" required>

    <label for="status">Status:</label>
    <select name="status" id="status" required>
        <option value="pending" <?php echo $order->getStatus() == 'pending' ? 'selected' : ''; ?>>Pending</option>
        <option value="Delivered" <?php echo $order->getStatus() == 'Delivered' ? 'selected' : ''; ?>>Delivered</option>
        <option value="shipped" <?php echo $order->getStatus() == 'shipped' ? 'selected' : ''; ?>>Shipped</option>
    </select>

    <label for="price">Prijs:</label>
    <input type="number" name="price" id="price" value="<?php echo htmlspecialchars($order->getPrice()); ?>" required>

    <label for="order_date">Datum Besteld:</label>
    <input type="date" name="order_date" id="order_date" value="<?php echo htmlspecialchars($order->getOrderDate()); ?>" required>

    <button type="submit">Opslaan</button>
</form>
