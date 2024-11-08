<h1>Backoffice</h1>

<div class="dashboard-statistics">
    <h2 class="mt-3">Bestellingen</h2>
    <div class="stat-item">
        <p><strong>Aantal actieve bestellingen:</strong> <?= $activeOrdersCount ?></p>
    </div>
    <div class="stat-item">
        <p><strong>Totaal aantal bestellingen:</strong> <?= $totalOrdersCount ?></p>
    </div>

    <h2 class="mt-3">Populairste Gitaar</h2>
    <div class="stat-item">
        <?php if ($mostPopularGuitar): ?>
            <p><strong>De populairste gitaar:</strong> <?= $mostPopularGuitar->getName() ?></p>
        <?php else: ?>
            <p>Er zijn nog geen bestellingen voor gitaren.</p>
        <?php endif; ?>
    </div>
</div>
