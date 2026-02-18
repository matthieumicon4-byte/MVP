<?php
namespace App\Models;

use App\Core\Database;

class User
{
    public static function findFirst(): ?array
    {
        $pdo = Database::getPdo();

        $stmt = $pdo->query("SELECT id, pseudo, email FROM users ORDER BY id ASC LIMIT 1");

        $user = $stmt->fetch();

        return $user ?: null;
    }
}
