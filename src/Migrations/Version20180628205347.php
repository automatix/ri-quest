<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180628205347 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE answers CHANGE type `type` VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE content_blocks CHANGE `order` `order` INT NOT NULL');
        $this->addSql('ALTER TABLE messages CHANGE `order` `order` INT NOT NULL');
        $this->addSql('ALTER TABLE semantical_message_stacks CHANGE semantic semantic VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE question_tasks CHANGE text text VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE answers CHANGE `type` type VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE content_blocks CHANGE `order` `order` INT DEFAULT NULL');
        $this->addSql('ALTER TABLE messages CHANGE `order` `order` INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question_tasks CHANGE text text VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE semantical_message_stacks CHANGE semantic semantic VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
