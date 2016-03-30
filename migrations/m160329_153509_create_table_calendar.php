<?php
use yii\db\Migration;

class m160329_153509_create_table_calendar extends Migration
{

	public function up()
	{
		$this->execute(
			"CREATE TABLE IF NOT EXISTS `calendar` (
          `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
          `text` TEXT NOT NULL COMMENT '',
          `creator` INT NOT NULL COMMENT '',
          `date_event` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
          PRIMARY KEY (`id`)  COMMENT '',
          INDEX `fk_evrnt_note_1_idx` (`creator` ASC)  COMMENT '',
          CONSTRAINT `fk_evrnt_note_1`
            FOREIGN KEY (`creator`)
            REFERENCES `user` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB;
        "
		);
	}

	public function down()
	{
		$this->execute('DROP TABLE IF EXISTS `calendar` ;');
	}
}
