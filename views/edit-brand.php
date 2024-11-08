<h1 class="text-xl font-bold mb-4">Merk Bewerken</h1>

<form action="/brands/update/<?php echo $brand->getId(); ?>" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow-md">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($brand->getName()); ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        Opslaan
    </button>
</form>