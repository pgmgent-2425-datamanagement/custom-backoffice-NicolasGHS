<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($title ?? '') . ' ' . $_ENV['SITE_NAME'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css?v=<?php if( $_ENV['DEV_MODE'] == "true" ) { echo time(); }; ?>">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-gray-200 flex flex-col">
            <div class="p-4 text-lg font-bold text-center text-white">
                Backoffice Dashboard
            </div>
            <nav class="flex-grow">
                <a href="/" class="block py-2.5 px-4 hover:bg-gray-700">Home</a>
                <a href="/guitars" class="block py-2.5 px-4 hover:bg-gray-700">Gitaren</a>
                <a href="/brands" class="block py-2.5 px-4 hover:bg-gray-700">Merken</a>
                <a href="/orders" class="block py-2.5 px-4 hover:bg-gray-700">Bestellingen</a>
                <a href="/filemanager" class="block py-2.5 px-4 hover:bg-gray-700">Filemanager</a>
            </nav>
            <footer class="p-4 text-center text-xs text-gray-500">
                &copy; <?= date('Y'); ?> - BrandName
            </footer>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow p-6 bg-white overflow-y-auto">

            <!-- Page Content -->
            <div class="content">
                <?= $content; ?>
            </div>
        </main>
    </div>

</body>
</html>
