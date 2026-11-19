<x-main-layout>
    <?php
    Notification::notify()
        ->title('Frontend notification')
        ->message('This notification is rendered immediately.')
        ->duration(5000)
        ->position('bottom-left')
        ->success();
    ?>
</x-main-layout>