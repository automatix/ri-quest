<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180725113600 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(<<<SQL
ALTER TABLE
	`riquest`.`workflow_concrete_processes`
DROP INDEX
	`fk_quest_workflow_idx`,
ADD KEY
	`fk_workflow_concrete_process_workflow_idx` (`workflow_id`)
;
SQL
        );
        $this->addSql(<<<SQL
ALTER TABLE
	`riquest`.`workflow_concrete_processes`
DROP INDEX
	`fk_quest_chat_idx`,
ADD KEY
	`fk_workflow_concrete_process_chat_idx` (`chat_id`)
;
SQL
        );
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(<<<SQL
ALTER TABLE
	`riquest`.`workflow_concrete_processes`
DROP INDEX
	`fk_workflow_concrete_process_workflow_idx`,
ADD KEY
	`fk_quest_workflow_idx` (`workflow_id`)
;
SQL
        );
        $this->addSql(<<<SQL
ALTER TABLE
	`riquest`.`workflow_concrete_processes`
DROP INDEX
	`fk_workflow_concrete_process_chat_idx`,
ADD KEY
	`fk_quest_chat_idx` (`chat_id`)
;
SQL
        );
    }
}
