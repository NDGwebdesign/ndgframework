<nav class="flex items-center justify-between px-6 py-4 border-b bg-white">

    <!-- Logo / Framework naam -->
    <div class="text-xl font-bold">
        NDG Framework
    </div>

    <!-- Links -->
    <div class="space-x-6">
        <a href="/" class="hover:text-blue-600 transition">Home</a>
        <a href="/docs" class="hover:text-blue-600 transition">Docs</a>
        <a href="/blog" class="hover:text-blue-600 transition">Blog</a>
        <a href="/contact" class="hover:text-blue-600 transition">Contact</a>
        <?php if (auth_check()): ?>
            <a href="/users" class="hover:text-blue-600 transition">Users</a>
        <?php endif; ?>
    </div>

    <?php if (!auth_check()): ?>
        <div class="flex items-center gap-3">
            <a href="/register" class="px-4 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-50 transition">
                Register
            </a>
            <a href="/login" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Login
            </a>
        </div>
    <?php else: ?>
        <div class="flex items-center gap-4">
            <span class="text-sm text-gray-600">
                <?= e(auth_user()['name'] ?? 'User') ?>
            </span>
            <form method="POST" action="/logout">
                <?= csrf_field() ?>
                <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition" type="submit">
                    Logout
                </button>
            </form>
        </div>
    <?php endif; ?>

</nav>