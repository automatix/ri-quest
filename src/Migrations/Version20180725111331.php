<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180725111331 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE concrete_processes DROP FOREIGN KEY FK_819D2361209E9EF4');
        $this->addSql('DROP INDEX fk_concrete_process_quest_idx ON concrete_processes');
        $this->addSql('ALTER TABLE concrete_processes DROP quest_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE concrete_processes ADD quest_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE concrete_processes ADD CONSTRAINT FK_819D2361209E9EF4 FOREIGN KEY (quest_id) REFERENCES quests (id)');
        $this->addSql('CREATE INDEX fk_concrete_process_quest_idx ON concrete_processes (quest_id)');
    }
}
