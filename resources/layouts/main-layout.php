<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= vite('resources/css/app.css') ?>
    <?= vite('resources/js/app.js') ?>
    <title><?= e(app_name()) ?></title>
</head>

<body>
    <header>
        <x-navbar />
    </header>

    <main>
        <?php Notification::renderFlashed(); ?>
        <?= $slot ?>
    </main>

    <footer class="bg-gray-900 text-gray-300 mt-20">
        <x-footer />
    </footer>
</body>

</html>