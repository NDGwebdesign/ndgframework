<x-main-layout>

<ul>
<?php foreach ($users as $user): ?>
    <li><?= $user['name'] ?></li>
    <li><?= $user['created_at'] ?></li>
<?php endforeach; ?>
</ul>

</x-main-layout>