<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180714205331 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE attempts_semantical_message_stacks (attempt_id INT UNSIGNED NOT NULL, semantical_message_stack_id INT UNSIGNED NOT NULL, INDEX IDX_974C8DCFB191BE6B (attempt_id), INDEX IDX_974C8DCF52A3CB2F (semantical_message_stack_id), PRIMARY KEY(attempt_id, semantical_message_stack_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attempts_semantical_message_stacks ADD CONSTRAINT FK_974C8DCFB191BE6B FOREIGN KEY (attempt_id) REFERENCES attempts (id)');
        $this->addSql('ALTER TABLE attempts_semantical_message_stacks ADD CONSTRAINT FK_974C8DCF52A3CB2F FOREIGN KEY (semantical_message_stack_id) REFERENCES semantical_message_stacks (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE attempts_semantical_message_stacks');
    }
}
