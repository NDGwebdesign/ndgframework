<x-main-layout>

<ul>
<?php foreach ($posts as $post): ?>
    <li><?= $post['title'] ?></li>
<?php endforeach; ?>
</ul>

</x-main-layout>