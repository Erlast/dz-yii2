<?php

use yii\db\Migration;

class m160328_150004_create_table_user extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `user` (
	        `id` INT NOT NULL AUTO_INCREMENT,
	        `username` VARCHAR(128) NOT NULL DEFAULT '',
	        `name` VARCHAR(45) NOT NULL DEFAULT '',
	        `surname` VARCHAR(45) NOT NULL DEFAULT '',
	        `password` VARCHAR(255) NOT NULL DEFAULT '',
	        `salt` VARCHAR(255) NOT NULL DEFAULT '',
	        `access_token` VARCHAR(255) NULL DEFAULT NULL,
	        `create_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	        PRIMARY KEY (`id`),
	        UNIQUE INDEX `access_token` (`access_token`),
	        UNIQUE INDEX `username` (`username`))
            COLLATE='utf8_unicode_ci'
            ENGINE=InnoDB
;");
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
