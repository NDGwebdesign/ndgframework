<?php

function view($view, $data = [])
{
    return new View($view, $data);
}

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function parseComponents($html)
{
    $resolveComponent = function ($component, $slot = '') {
        $layout = __DIR__."/../resources/layouts/$component.php";
        $componentFile = __DIR__."/../resources/components/$component.php";

        $file = file_exists($layout) ? $layout : $componentFile;

        if (!file_exists($file)) {
            return "<!-- component $component not found -->";
        }

        ob_start();
        require $file;
        return ob_get_clean();
    };

    $previous = null;

    while ($previous !== $html) {
        $previous = $html;

        $html = preg_replace_callback(
            '/<x-([a-zA-Z0-9\-]+)\s*\/\s*>/',
            function ($matches) use ($resolveComponent) {
                $component = $matches[1];
                return $resolveComponent($component);
            },
            $html
        );

        $html = preg_replace_callback(
            '/<x-([a-zA-Z0-9\-]+)>(.*?)<\/x-\1>/s',
            function ($matches) use ($resolveComponent) {
                $component = $matches[1];
                $slot = $matches[2];
                return $resolveComponent($component, $slot);
            },
            $html
        );
    }

    return $html;
}
function vite($file)
{
    $manifestPath = __DIR__ . '/../public/build/.vite/manifest.json';

    if (!file_exists($manifestPath)) {
        return "<!-- vite manifest not found, run npm run build -->";
    }

    $manifest = json_decode(file_get_contents($manifestPath), true);

    if (!isset($manifest[$file])) {
        return "<!-- asset $file not found -->";
    }

    return "<link rel='stylesheet' href='/build/{$manifest[$file]['file']}'>";
}

