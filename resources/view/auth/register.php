<x-main-layout>

<section class="max-w-md mx-auto px-6 py-16">
    <h1 class="text-3xl font-bold mb-6">Account aanmaken</h1>

    <?php if (!empty($errors ?? [])): ?>
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 text-red-700 px-4 py-3">
            <ul class="list-disc pl-5 space-y-1">
                <?php foreach ($errors as $error): ?>
                    <li><?= e($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="/register" class="space-y-5">
        <?= csrf_field() ?>

        <div>
            <label class="block text-sm font-medium mb-2" for="name">Naam</label>
            <input
                id="name"
                name="name"
                type="text"
                value="<?= e($old['name'] ?? '') ?>"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
                minlength="2"
            >
        </div>

        <div>
            <label class="block text-sm font-medium mb-2" for="email">E-mail</label>
            <input
                id="email"
                name="email"
                type="email"
                value="<?= e($old['email'] ?? '') ?>"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
        </div>

        <div>
            <label class="block text-sm font-medium mb-2" for="password">Wachtwoord</label>
            <input
                id="password"
                name="password"
                type="password"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
                minlength="8"
            >
        </div>

        <div>
            <label class="block text-sm font-medium mb-2" for="password_confirmation">Herhaal wachtwoord</label>
            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
                minlength="8"
            >
        </div>

        <button class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition" type="submit">
            Registreren
        </button>
    </form>

    <p class="mt-6 text-sm text-gray-600">
        Heb je al een account?
        <a href="/login" class="text-blue-600 hover:underline">Log hier in</a>
    </p>
</section>

</x-main-layout>
