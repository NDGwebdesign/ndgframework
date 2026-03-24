<?php

return new class {
    public function up()
    {
        $pdo = Database::connect();

        if (!$this->tableExists($pdo, 'users')) {
            return;
        }

        if (!$this->columnExists($pdo, 'users', 'email')) {
            $pdo->exec("ALTER TABLE `users` ADD COLUMN `email` VARCHAR(255) NULL");
        }

        if (!$this->columnExists($pdo, 'users', 'password')) {
            $pdo->exec("ALTER TABLE `users` ADD COLUMN `password` VARCHAR(255) NULL");
        }

        if (!$this->indexExists($pdo, 'users', 'users_email_unique')) {
            $pdo->exec("ALTER TABLE `users` ADD UNIQUE KEY `users_email_unique` (`email`)");
        }
    }

    public function down()
    {
        // No destructive rollback to avoid accidental data loss of auth columns.
    }

    private function tableExists(PDO $pdo, string $table): bool
    {
        $tableQuoted = $pdo->quote($table);
        $stmt = $pdo->query("SHOW TABLES LIKE {$tableQuoted}");

        return (bool) $stmt->fetchColumn();
    }

    private function columnExists(PDO $pdo, string $table, string $column): bool
    {
        $columnQuoted = $pdo->quote($column);
        $stmt = $pdo->query('SHOW COLUMNS FROM `' . $table . '` LIKE ' . $columnQuoted);

        return (bool) $stmt->fetchColumn();
    }

    private function indexExists(PDO $pdo, string $table, string $index): bool
    {
        $indexQuoted = $pdo->quote($index);
        $stmt = $pdo->query('SHOW INDEX FROM `' . $table . '` WHERE Key_name = ' . $indexQuoted);

        return (bool) $stmt->fetch();
    }
};
