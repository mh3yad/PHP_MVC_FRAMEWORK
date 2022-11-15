<?php


use app\core\Application;

class m003_create_user_table
{
    public function up(){
       $stmt =  Application::$app->db->pdo->prepare("CREATE TABLE users(
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        email varchar(255) NOT NULL ,
                        firstname varchar(255) NOT NULL ,
                        lastname varchar(255) NOT NULL,
                        status SMALLINT NOT NULL ,
                        CREATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                    )");
       $stmt->execute();
    }
}