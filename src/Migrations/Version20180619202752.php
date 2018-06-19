<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180619202752 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE answers ADD date_created DATETIME NOT NULL, ADD date_modified DATETIME NOT NULL');
        $this->addSql('ALTER TABLE content_blocks ADD date_created DATETIME NOT NULL, ADD date_modified DATETIME NOT NULL');
        $this->addSql('ALTER TABLE concrete_processes ADD date_created DATETIME NOT NULL, ADD date_modified DATETIME NOT NULL');
        $this->addSql('ALTER TABLE tasks ADD date_created DATETIME NOT NULL, ADD date_modified DATETIME NOT NULL');
        $this->addSql('ALTER TABLE processes ADD date_created DATETIME NOT NULL, ADD date_modified DATETIME NOT NULL');
        $this->addSql('ALTER TABLE messages ADD date_created DATETIME NOT NULL, ADD date_modified DATETIME NOT NULL');
        $this->addSql('ALTER TABLE message_stacks ADD date_created DATETIME NOT NULL, ADD date_modified DATETIME NOT NULL');
        $this->addSql('ALTER TABLE quests ADD date_created DATETIME NOT NULL, ADD date_modified DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE answers DROP date_created, DROP date_modified');
        $this->addSql('ALTER TABLE concrete_processes DROP date_created, DROP date_modified');
        $this->addSql('ALTER TABLE content_blocks DROP date_created, DROP date_modified');
        $this->addSql('ALTER TABLE message_stacks DROP date_created, DROP date_modified');
        $this->addSql('ALTER TABLE messages DROP date_created, DROP date_modified');
        $this->addSql('ALTER TABLE processes DROP date_created, DROP date_modified');
        $this->addSql('ALTER TABLE quests DROP date_created, DROP date_modified');
        $this->addSql('ALTER TABLE tasks DROP date_created, DROP date_modified');
    }
}
