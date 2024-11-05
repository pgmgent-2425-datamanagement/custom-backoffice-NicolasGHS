<h1 class="text-xl font-bold mb-4">Nieuwe Gitaar Toevoegen</h1>

<form action="/guitars/add" method="post" class="space-y-4 bg-white p-6 rounded-lg shadow-md">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
        <input type="text" id="name" name="name" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving</label>
        <textarea id="description" name="description" rows="4" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
    </div>

    <div>
        <label for="stock" class="block text-sm font-medium text-gray-700">Voorraad</label>
        <input type="number" id="stock" name="stock" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label for="brand" class="block text-sm font-medium text-gray-700">Merk</label>
        <input type="text" id="brand" name="brand" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        Opslaan
    </button>
</form>
