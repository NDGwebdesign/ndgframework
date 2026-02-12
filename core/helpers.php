<?php

function view($view, $data = [])
{
    $view = str_replace('.', '/', $view);
    extract($data);

    ob_start();
    require __DIR__."/../resources/view/$view.php";
    $html = ob_get_clean();

    return parseComponents($html);
}

function parseComponents($html)
{
    // paired tags met slot
    $html = preg_replace_callback(
        '/<x-([a-zA-Z0-9\-]+)>(.*?)<\/x-\1>/s',
        function ($matches) {

            $component = $matches[1];
            $slot = $matches[2];

            $fileLayouts = __DIR__."/../resources/layouts/$component.php";
            $fileComponents = __DIR__."/../resources/components/$component.php";

            $file = file_exists($fileLayouts)
                ? $fileLayouts
                : $fileComponents;

            if (!file_exists($file)) {
                return "<!-- component $component not found -->";
            }

            ob_start();
            require $file;
            return ob_get_clean();
        },
        $html
    );

    // self closing components
    $html = preg_replace_callback(
        '/<x-([a-zA-Z0-9\-]+)\s*\/>/',
        function ($matches) {

            $component = $matches[1];
            $file = __DIR__."/../resources/components/$component.php";

            if (!file_exists($file)) {
                return "<!-- component $component not found -->";
            }

            ob_start();
            require $file;
            return ob_get_clean();
        },
        $html
    );

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

