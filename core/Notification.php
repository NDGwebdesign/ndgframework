<?php

/**
 * Render fluent toast notifications in a view.
 *
 * Notification::notify()->success('User saved!');
 * Notification::notify()
 *     ->title('User created')
 *     ->message('The user was successfully created.')
 *     ->duration(5000)
 *     ->position('top-right')
 *     ->success();
 *
 * Notification::notify()
 *     ->title('User saved')
 *     ->flashSuccess('The user was saved.');
 * redirect('/users');
 */
class Notification
{
    private const FLASH_SESSION_KEY = '_ndg_notifications';

    private string $title = '';
    private string $message = '';
    private int $duration = 3000;
    private string $position = 'top-right';

    public static function notify(): self
    {
        return new self();
    }

    public function title(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function message(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function duration(int $duration): self
    {
        if ($duration < 0) {
            throw new InvalidArgumentException('Notification duration cannot be negative.');
        }

        $this->duration = $duration;
        return $this;
    }

    public function position(string $position): self
    {
        $positions = [
            'top-left',
            'top-center',
            'top-right',
            'bottom-left',
            'bottom-center',
            'bottom-right',
        ];

        if (!in_array($position, $positions, true)) {
            throw new InvalidArgumentException('Unsupported notification position: ' . $position);
        }

        $this->position = $position;
        return $this;
    }

    public function success(?string $message = null): self
    {
        return $this->render('success', $message);
    }

    public function error(?string $message = null): self
    {
        return $this->render('error', $message);
    }

    public function warning(?string $message = null): self
    {
        return $this->render('warning', $message);
    }

    public function info(?string $message = null): self
    {
        return $this->render('info', $message);
    }

    public function flash(string $type = 'info', ?string $message = null): self
    {
        $this->assertType($type);
        self::assertSession();

        $_SESSION[self::FLASH_SESSION_KEY][] = [
            'type' => $type,
            'title' => $this->title,
            'message' => $message ?? $this->message,
            'duration' => $this->duration,
            'position' => $this->position,
        ];

        return $this;
    }

    public function flashSuccess(?string $message = null): self
    {
        return $this->flash('success', $message);
    }

    public function flashError(?string $message = null): self
    {
        return $this->flash('error', $message);
    }

    public function flashWarning(?string $message = null): self
    {
        return $this->flash('warning', $message);
    }

    public function flashInfo(?string $message = null): self
    {
        return $this->flash('info', $message);
    }

    public static function renderFlashed(): void
    {
        self::assertSession();

        $notifications = $_SESSION[self::FLASH_SESSION_KEY] ?? [];
        unset($_SESSION[self::FLASH_SESSION_KEY]);

        foreach ($notifications as $notification) {
            if (!is_array($notification) || !isset($notification['type'])) {
                throw new UnexpectedValueException('Invalid notification data in session.');
            }

            self::notify()
                ->title((string) ($notification['title'] ?? ''))
                ->message((string) ($notification['message'] ?? ''))
                ->duration((int) ($notification['duration'] ?? 3000))
                ->position((string) ($notification['position'] ?? 'top-right'))
                ->render((string) $notification['type']);
        }
    }

    private function render(string $type, ?string $message = null): self
    {
        $styles = [
            'success' => ['border-green-500', 'bg-green-50', 'text-green-800'],
            'error' => ['border-red-500', 'bg-red-50', 'text-red-800'],
            'warning' => ['border-yellow-500', 'bg-yellow-50', 'text-yellow-800'],
            'info' => ['border-blue-500', 'bg-blue-50', 'text-blue-800'],
        ];
        $positions = [
            'top-left' => 'top-4 left-4',
            'top-center' => 'top-4 left-1/2 -translate-x-1/2',
            'top-right' => 'top-4 right-4',
            'bottom-left' => 'bottom-4 left-4',
            'bottom-center' => 'bottom-4 left-1/2 -translate-x-1/2',
            'bottom-right' => 'bottom-4 right-4',
        ];
        $this->assertType($type);
        $style = $styles[$type];
        $title = htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($message ?? $this->message, ENT_QUOTES, 'UTF-8');
        $duration = (string) $this->duration;
        $liveMode = $type === 'error' ? 'assertive' : 'polite';

        echo '<div class="ndg-notification fixed z-50 w-full max-w-sm rounded-lg border-l-4 p-4 shadow-lg '
            . $positions[$this->position] . ' ' . $style[0] . ' ' . $style[1] . ' ' . $style[2]
            . '" role="alert" aria-live="' . $liveMode . '" data-duration="' . $duration . '">';
        echo '<div class="flex items-start justify-between gap-4">';
        echo '<div>';

        if ($title !== '') {
            echo '<p class="font-semibold">' . $title . '</p>';
        }

        if ($message !== '') {
            echo '<p class="mt-1 text-sm">' . $message . '</p>';
        }

        echo '</div>';
        echo '<button type="button" class="text-xl leading-none opacity-60 hover:opacity-100" '
            . 'aria-label="Close notification">&times;</button>';
        echo '</div>';
        echo '</div>';
        echo '<script>(function () {'
            . 'var notification = document.currentScript.previousElementSibling;'
            . 'var close = notification.querySelector("button");'
            . 'var remove = function () { notification.remove(); };'
            . 'close.addEventListener("click", remove);'
            . 'var duration = Number(notification.dataset.duration);'
            . 'if (duration > 0) { window.setTimeout(remove, duration); }'
            . '}());</script>';

        return $this;
    }

    private function assertType(string $type): void
    {
        if (!in_array($type, ['success', 'error', 'warning', 'info'], true)) {
            throw new InvalidArgumentException('Unsupported notification type: ' . $type);
        }
    }

    private static function assertSession(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            throw new LogicException('Notifications require an active PHP session.');
        }
    }
}