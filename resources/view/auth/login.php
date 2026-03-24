<x-main-layout>

<section class="max-w-md mx-auto px-6 py-16">
    <h1 class="text-3xl font-bold mb-6">Inloggen</h1>

    <?php if (!empty($registered ?? false)): ?>
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 text-green-700 px-4 py-3">
            Account succesvol aangemaakt. Je kunt nu inloggen.
        </div>
    <?php endif; ?>

    <?php if (!empty($error ?? null)): ?>
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 text-red-700 px-4 py-3">
            <?= e($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="/login" class="space-y-5">
        <?= csrf_field() ?>

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
            >
        </div>

        <button class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition" type="submit">
            Inloggen
        </button>
    </form>

    <p class="mt-6 text-sm text-gray-600">
        Nog geen account?
        <a href="/register" class="text-blue-600 hover:underline">Maak er hier een aan</a>
    </p>
</section>

</x-main-layout>
