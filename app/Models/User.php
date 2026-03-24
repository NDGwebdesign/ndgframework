<?php

class User extends Model
{
    protected static $table = 'users';
    protected static bool $authSchemaChecked = false;

    public static function findByEmail(string $email): ?array
    {
        self::ensureAuthSchema();

        $pdo = Database::connect();

        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);

        $user = $stmt->fetch();

        return $user ?: null;
    }

    public static function createUser(string $name, string $email, string $passwordHash): void
    {
        self::ensureAuthSchema();

        self::create([
            'name' => $name,
            'email' => $email,
            'password' => $passwordHash,
        ]);
    }

    protected static function ensureAuthSchema(): void
    {
        if (self::$authSchemaChecked) {
            return;
        }

        $pdo = Database::connect();

        if (!self::columnExists($pdo, 'email')) {
            $pdo->exec("ALTER TABLE `users` ADD COLUMN `email` VARCHAR(255) NULL");
        }

        if (!self::columnExists($pdo, 'password')) {
            $pdo->exec("ALTER TABLE `users` ADD COLUMN `password` VARCHAR(255) NULL");
        }

        if (!self::indexExists($pdo, 'users_email_unique')) {
            $pdo->exec("ALTER TABLE `users` ADD UNIQUE KEY `users_email_unique` (`email`)");
        }

        self::$authSchemaChecked = true;
    }

    protected static function columnExists(PDO $pdo, string $column): bool
    {
        $columnQuoted = $pdo->quote($column);
        $stmt = $pdo->query('SHOW COLUMNS FROM `users` LIKE ' . $columnQuoted);

        return (bool) $stmt->fetchColumn();
    }

    protected static function indexExists(PDO $pdo, string $index): bool
    {
        $indexQuoted = $pdo->quote($index);
        $stmt = $pdo->query('SHOW INDEX FROM `users` WHERE Key_name = ' . $indexQuoted);

        return (bool) $stmt->fetch();
    }
}