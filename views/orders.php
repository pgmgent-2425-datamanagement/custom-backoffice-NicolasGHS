<h1 class="text-xl font-bold mb-4">Bestellingen</h1>

<!-- Zoekformulier -->
<form action="/orders" method="GET" class="mb-4">
    <label for="status" class="mr-2">Filter op status:</label>
    <select name="status" id="status" class="px-4 py-2 border border-gray-300 rounded-md">
        <option value="">Alle</option>
        <option value="pending" <?= isset($_GET['status']) && $_GET['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="delivered" <?= isset($_GET['status']) && $_GET['status'] == 'delivered' ? 'selected' : '' ?>>Delivered</option>
        <option value="shipped" <?= isset($_GET['status']) && $_GET['status'] == 'shipped' ? 'selected' : '' ?>>Shipped</option>
    </select>
    <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md">Filter</button>

    <label for="search" class="ml-4 mr-2">Zoeken naar gitaarnaam:</label>
    <input type="text" name="search" id="search" value="<?= htmlspecialchars($searchTerm) ?>" class="px-4 py-2 border border-gray-300 rounded-md" placeholder="Zoek op gitaarnaam">
    <button type="submit" class="ml-2 px-4 py-2 bg-green-500 text-white rounded-md">Zoeken</button>
</form>

<a href="/orders/add" class="inline-flex items-center px-4 py-2 bg-gray-700 mb-3 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
    </svg>
    Voeg Bestelling Toe
</a>

<?php if (!empty($orders)): ?>
    <ul class="space-y-4">
        <?php foreach ($orders as $order): ?>
            <li class="p-6 bg-gray-100 rounded-lg shadow-md">
                <div>
                    <div class="text-lg font-semibold text-gray-700">User: <?php echo htmlspecialchars($order['user_id']); ?></div>
                    <div class="text-gray-600">Status: <?php echo htmlspecialchars($order['status']); ?></div>
                    <div class="text-gray-600">Price: <?php echo htmlspecialchars($order['price']); ?></div>
                    <div class="text-gray-600">Datum besteld: <?php echo htmlspecialchars($order['order_date']); ?></div>

                    <!-- Toon de gitaren per bestelling -->
                    <div class="text-gray-600 mt-2">
                        <strong>Gitaren in deze bestelling:</strong>
                        <?php if (!empty($order['guitar_name'])): ?>
                            <ul>
                                <li><?php echo htmlspecialchars($order['guitar_name']); ?></li>
                            </ul>
                        <?php else: ?>
                            <p>Geen gitaren gevonden voor deze bestelling.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="flex space-x-4 mt-4">
                    <!-- Edit button -->
                    <a href="/orders/edit/<?php echo $order['order_id']; ?>" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-4.772-1.768a2 2 0 112.828 2.828L7 21H3v-4L13.232 6.232z"/>
                        </svg>
                        Bewerken
                    </a>

                    <!-- Delete button -->
                    <form action="/orders/delete/<?php echo $order['order_id']; ?>" method="POST" onsubmit="return confirm('Weet je zeker dat je deze bestelling wilt verwijderen?');">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Verwijder
                        </button>
                    </form>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p class="text-gray-600">Geen bestellingen gevonden.</p>
<?php endif; ?>
