<h1 class="text-xl font-bold mb-4">Gitaren</h1>

<?php if (!empty($guitars)): ?>
    <ul class="space-y-4">
        <?php foreach ($guitars as $guitar): ?>
            <li class="p-6 bg-gray-100 rounded-lg shadow-md">
                <div class="text-lg font-semibold text-gray-700">Naam: <?php echo htmlspecialchars($guitar->getName()); ?></div>
                <div class="text-gray-600">Beschrijving: <?php echo htmlspecialchars($guitar->getDescription()); ?></div>
                <div class="text-gray-600">Voorraad: <?php echo htmlspecialchars($guitar->getStock()); ?></div>
                <div class="text-gray-600">Merk: <?php echo htmlspecialchars($guitar->getBrandName()); ?></div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p class="text-gray-600">Geen gitaren gevonden.</p>
<?php endif; ?>