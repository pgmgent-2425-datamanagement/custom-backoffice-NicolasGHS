<h1 class="text-xl font-bold mb-4">Nieuwe Bestelling Toevoegen</h1>

<form action="/orders/add" method="post" class="space-y-4 bg-white p-6 rounded-lg shadow-md">
    <div>
        <label for="user_id" class="block text-sm font-medium text-gray-700">Gebruiker ID</label>
        <input type="number" id="user_id" name="user_id" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
        <select id="status" name="status" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
            <option value="shipped">Shipped</option>
            <option value="cancelled">Cancelled</option>
        </select>
    </div>

    <div>
        <label for="price" class="block text-sm font-medium text-gray-700">Prijs</label>
        <input type="number" id="price" name="price" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
        <label for="order_date" class="block text-sm font-medium text-gray-700">Datum Besteld</label>
        <input type="date" id="order_date" name="order_date" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        Opslaan
    </button>
</form>
