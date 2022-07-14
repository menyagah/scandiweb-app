<?php
class m0001_initial {
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "CREATE TABLE products(
                id INT AUTO_INCREMENT PRIMARY KEY,
                sku VARCHAR(255) NOT NULL,
                name VARCHAR(255) NOT NULL,
                price DECIMAL(10,2) NOT NULL,
                 size VARCHAR(255)  NULL ,
                 weight VARCHAR(255) NULL ,
                 height VARCHAR(255)  NULL ,
                 width  VARCHAR(255) NULL ,
                 length VARCHAR(255)  NULL ,
                 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB;";
        $db->pdo->exec($SQL);

    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE products";
        $db->pdo->exec($SQL);
    }
}