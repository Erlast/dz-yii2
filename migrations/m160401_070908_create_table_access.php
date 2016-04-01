<?php

use yii\db\Migration;

class m160401_070908_create_table_access extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `access` (
          `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
          `user_owner` INT NOT NULL COMMENT '',
          `user_guest` INT NOT NULL COMMENT '',
          `date` DATE NOT NULL COMMENT '',
          PRIMARY KEY (`id`)  COMMENT '',
          INDEX `fk_access_1_idx` (`user_owner` ASC)  COMMENT '',
          INDEX `fk_access_2_idx` (`user_guest` ASC)  COMMENT '',
          CONSTRAINT `fk_access_1`
            FOREIGN KEY (`user_owner`)
            REFERENCES `user` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
          CONSTRAINT `fk_access_2`
            FOREIGN KEY (`user_guest`)
            REFERENCES `user` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB;");
    }

    public function down()
    {
        $this->excute('DROP TABLE IF EXISTS `access` ;');
    }
}
