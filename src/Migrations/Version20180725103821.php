<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180725103821 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE workflow_concrete_processes ADD workflow_id INT UNSIGNED NOT NULL, ADD chat_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE workflow_concrete_processes ADD CONSTRAINT FK_682052222C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflows (id)');
        $this->addSql('ALTER TABLE workflow_concrete_processes ADD CONSTRAINT FK_682052221A9A7125 FOREIGN KEY (chat_id) REFERENCES chats (id)');
        $this->addSql('CREATE INDEX fk_quest_workflow_idx ON workflow_concrete_processes (workflow_id)');
        $this->addSql('CREATE INDEX fk_quest_chat_idx ON workflow_concrete_processes (chat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE workflow_concrete_processes DROP FOREIGN KEY FK_682052222C7C2CBA');
        $this->addSql('ALTER TABLE workflow_concrete_processes DROP FOREIGN KEY FK_682052221A9A7125');
        $this->addSql('DROP INDEX fk_quest_workflow_idx ON workflow_concrete_processes');
        $this->addSql('DROP INDEX fk_quest_chat_idx ON workflow_concrete_processes');
        $this->addSql('ALTER TABLE workflow_concrete_processes DROP workflow_id, DROP chat_id');
    }
}
