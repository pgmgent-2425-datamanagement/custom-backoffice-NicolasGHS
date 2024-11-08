<h1 class="text-xl font-bold mb-4">Gitaren</h1>

<a href="/guitars/add" class="inline-flex items-center px-4 py-2 bg-gray-700 mb-3 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
    </svg>
    Voeg Gitaar Toe
</a>

<?php if (!empty($guitars)): ?>
    <ul class="space-y-4">
        <?php foreach ($guitars as $guitar): ?>
            <li class="p-6 bg-gray-100 rounded-lg shadow-md">
                <div>
                    <div class="text-lg font-semibold text-gray-700">Naam: <?php echo htmlspecialchars($guitar->getName()); ?></div>
                    <div class="text-gray-600">Beschrijving: <?php echo htmlspecialchars($guitar->getDescription()); ?></div>
                    <div class="text-gray-600">Voorraad: <?php echo htmlspecialchars($guitar->getStock()); ?></div>
                    <div class="text-gray-600">Merk: <?php echo htmlspecialchars($guitar->getBrandName()); ?></div>

                    <?php if ($guitar->getImage()): ?>
                        <img src="/images/<?= $guitar->getImage(); ?>" alt="Gitaar Foto" class="mt-4 max-w-xs">
                    <?php endif; ?>
                </div>
                
                <!-- Buttons for Edit and Delete -->
                <div class="flex space-x-4 mt-4">
                    <!-- Edit button -->
                    <a href="/guitars/edit/<?php echo $guitar->getGuitarId(); ?>" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-4.772-1.768a2 2 0 112.828 2.828L7 21H3v-4L13.232 6.232z"/>
                        </svg>
                        Bewerken
                    </a>

                    <!-- Delete button -->
                    <form action="/guitars/delete/<?php echo $guitar->getGuitarId(); ?>" method="POST" onsubmit="return confirm('Weet je zeker dat je deze gitaar wilt verwijderen?');">
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
    <p class="text-gray-600">Geen gitaren gevonden.</p>
<?php endif; ?>
