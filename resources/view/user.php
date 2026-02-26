<x-main-layout>

<ul>
<?php foreach ($users as $user): ?>
    <li><?= $user['name'] ?></li>
<?php endforeach; ?>
</ul>

</x-main-layout>