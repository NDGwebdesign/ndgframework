#!/usr/bin/env php
<?php

require __DIR__ . '/core/Env.php';
require __DIR__ . '/core/Database.php';
require __DIR__ . '/core/Schema.php';
require __DIR__ . '/core/Migration.php';
require __DIR__ . '/core/Blueprint.php';

Env::load(__DIR__ . '/.env');

$command = $argv[1] ?? null;
$name = $argv[2] ?? null;

switch ($command) {
    case 'make:migration':
        Migration::make($name);
        break;

    case 'migrate':
        Migration::migrate();
        break;

    case 'migrate:rollback':
        Migration::rollback();
        break;

    default:
        echo "NDG CLI\n";
        echo "Commands:\n";
        echo "  php ndg.php make:migration <name>\n";
        echo "  php ndg.php migrate\n";
        echo "  php ndg.php migrate:rollback\n";
}
