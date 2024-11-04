<h1>Guitars</h1>

<?php if (!empty($guitars)): ?>
    <ul>
        <?php foreach ($guitars as $guitar): ?>
            <li>
                Naam: <?php echo htmlspecialchars($guitar->getName()); ?><br>
                Beschrijving: <?php echo htmlspecialchars($guitar->getDescription()); ?><br>
                Voorraad: <?php echo htmlspecialchars($guitar->getStock()); ?><br>
                Brand: <?php echo htmlspecialchars($guitar->getBrandName()); ?> <!-- Hier is de aanpassing -->
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No guitars found.</p>
<?php endif; ?>