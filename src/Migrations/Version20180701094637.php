<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180701094637 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE concrete_processes ADD quest_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE concrete_processes ADD CONSTRAINT FK_819D2361209E9EF4 FOREIGN KEY (quest_id) REFERENCES quests (id)');
        $this->addSql('CREATE INDEX fk_concrete_process_quest_idx ON concrete_processes (quest_id)');
        $this->addSql('ALTER TABLE quests DROP FOREIGN KEY FK_989E5D343B381CBC');
        $this->addSql('DROP INDEX fk_quest_concrete_process_idx ON quests');
        $this->addSql('ALTER TABLE quests DROP concrete_process_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE concrete_processes DROP FOREIGN KEY FK_819D2361209E9EF4');
        $this->addSql('DROP INDEX fk_concrete_process_quest_idx ON concrete_processes');
        $this->addSql('ALTER TABLE concrete_processes DROP quest_id');
        $this->addSql('ALTER TABLE quests ADD concrete_process_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE quests ADD CONSTRAINT FK_989E5D343B381CBC FOREIGN KEY (concrete_process_id) REFERENCES concrete_processes (id)');
        $this->addSql('CREATE INDEX fk_quest_concrete_process_idx ON quests (concrete_process_id)');
    }
}
