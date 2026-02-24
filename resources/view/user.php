<x-main-layout>

<h1><?= $title ?></h1>

<ul>
<?php foreach ($users as $user): ?>
    <li><?= $user ?></li>
<?php endforeach; ?>
</ul>

</x-main-layout>