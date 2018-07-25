<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180725112200 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE quests');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE quests (id INT UNSIGNED AUTO_INCREMENT NOT NULL, workflow_id INT UNSIGNED NOT NULL, chat_id INT UNSIGNED NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, INDEX fk_quest_chat_idx (chat_id), INDEX fk_quest_workflow_idx (workflow_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quests ADD CONSTRAINT FK_989E5D341A9A7125 FOREIGN KEY (chat_id) REFERENCES chats (id)');
        $this->addSql('ALTER TABLE quests ADD CONSTRAINT FK_989E5D342C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflows (id)');
    }
}
