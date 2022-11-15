<?php


class m004_add_password
{
    public function up()
    {
        $stmt = \app\core\Application::$app->db->pdo->prepare("
                ALTER TABLE users ADD COLUMN password varchar(255)
        ");
        $stmt->execute();
    }
}