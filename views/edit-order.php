<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg mt-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Bestelling Bewerken</h1>

    <form action="/orders/update/<?php echo $order->getOrderId(); ?>" method="POST" class="space-y-4">
        
        <div>
            <label for="user_id" class="block text-sm font-medium text-gray-700">Gebruiker ID:</label>
            <input 
                type="number" 
                name="user_id" 
                id="user_id" 
                value="<?php echo htmlspecialchars($order->getUserId()); ?>" 
                required 
                class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
            <select 
                name="status" 
                id="status" 
                required 
                class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
                <option value="pending" <?php echo $order->getStatus() == 'pending' ? 'selected' : ''; ?>>Pending</option>
                <option value="Delivered" <?php echo $order->getStatus() == 'Delivered' ? 'selected' : ''; ?>>Delivered</option>
                <option value="shipped" <?php echo $order->getStatus() == 'shipped' ? 'selected' : ''; ?>>Shipped</option>
            </select>
        </div>

        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Prijs:</label>
            <input 
                type="number" 
                name="price" 
                id="price" 
                value="<?php echo htmlspecialchars($order->getPrice()); ?>" 
                required 
                class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
        </div>

        <div>
            <label for="order_date" class="block text-sm font-medium text-gray-700">Datum Besteld:</label>
            <input 
                type="date" 
                name="order_date" 
                id="order_date" 
                value="<?php echo htmlspecialchars($order->getOrderDate()); ?>" 
                required 
                class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
        </div>

        <div>
            <label for="guitars" class="block text-sm font-medium text-gray-700">Gitaren:</label>
            <select 
                id="guitars" 
                name="guitars[]" 
                multiple 
                class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
                <?php foreach ($guitars as $guitar): ?>
                    <option value="<?= $guitar->getGuitarId(); ?>" <?php echo in_array($guitar->getGuitarId(), array_map(function($guitar) { return $guitar->getGuitarId(); }, $orderGuitars)) ? 'selected' : ''; ?>>
                        <?= $guitar->getName(); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button 
            type="submit" 
            class="w-full bg-indigo-600 text-white p-2 rounded-lg font-semibold mt-4 hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
        >
            Opslaan
        </button>
    </form>
</div>
