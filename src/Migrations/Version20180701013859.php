<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180701013859 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users (id INT UNSIGNED AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(50) DEFAULT NULL, gender VARCHAR(1) DEFAULT NULL, privacy_policy_agreed TINYINT(1) DEFAULT \'0\' NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chats (id INT UNSIGNED AUTO_INCREMENT NOT NULL, user_id INT UNSIGNED DEFAULT NULL, `type` VARCHAR(255) NOT NULL, identifier VARCHAR(50) DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, INDEX fk_chat_user_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chats ADD CONSTRAINT FK_2D68180FA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE quests ADD chat_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE quests ADD CONSTRAINT FK_989E5D341A9A7125 FOREIGN KEY (chat_id) REFERENCES chats (id)');
        $this->addSql('CREATE INDEX fk_quest_chat_idx ON quests (chat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE chats DROP FOREIGN KEY FK_2D68180FA76ED395');
        $this->addSql('ALTER TABLE quests DROP FOREIGN KEY FK_989E5D341A9A7125');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE chats');
        $this->addSql('DROP INDEX fk_quest_chat_idx ON quests');
        $this->addSql('ALTER TABLE quests DROP chat_id');
    }
}
