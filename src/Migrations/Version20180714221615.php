<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180714221615 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE loops (id INT UNSIGNED AUTO_INCREMENT NOT NULL, concrete_process_id INT UNSIGNED NOT NULL, `type` VARCHAR(255) NOT NULL, `count` INT NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, INDEX fk_loop_concrete_process_idx (concrete_process_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE loops ADD CONSTRAINT FK_5C1D5F693B381CBC FOREIGN KEY (concrete_process_id) REFERENCES concrete_processes (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE loops');
    }
}
