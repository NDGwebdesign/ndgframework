<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= vite('resources/css/app.css') ?>
    <title>ndgframework</title>
</head>

<body>
    <header>
        <x-navbar />
    </header>

    <main>
        <?= $slot ?>
    </main>

    <footer>
        <x-footer />
    </footer>
</body>

</html>