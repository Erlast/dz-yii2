<?php

use yii\db\Migration;

class m160321_151602_create_bid_table extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `bid` (
	        `id` INT NOT NULL AUTO_INCREMENT,
	        `name` VARCHAR(255) NOT NULL DEFAULT '0',
	        `address` VARCHAR(255) NOT NULL DEFAULT '0',
	        `email` VARCHAR(255) NOT NULL DEFAULT '0',
	        `phone` VARCHAR(10) NOT NULL DEFAULT '0',
	        `date_create` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	      PRIMARY KEY (`id`)
          )
          COLLATE='utf8_unicode_ci'
        ENGINE=InnoDB;
        ");
    }

    public function down()
    {
        $this->execute("
            DROP TABLE IF EXISTS `bid`;
        ");
    }
}
