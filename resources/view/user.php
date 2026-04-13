<x-main-layout>

<form action="/users" method="post">
    <input type="text" name="name" placeholder="Naam" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Gebruiker toevoegen</button>
</form>

<ul>
<?php foreach ($users as $user): ?>
    <li><?= $user['name'] ?></li>
    <li><?= $user['created_at'] ?></li>
<?php endforeach; ?>
</ul>

</x-main-layout>