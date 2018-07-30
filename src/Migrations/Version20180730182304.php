<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180730182304 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE access_concrete_processes DROP FOREIGN KEY FK_772ACF06BF396750');
        $this->addSql('ALTER TABLE completion_concrete_processes DROP FOREIGN KEY FK_8A876786BF396750');
        $this->addSql('ALTER TABLE concrete_processes DROP FOREIGN KEY FK_819D2361727ACA70');
        $this->addSql('ALTER TABLE loops DROP FOREIGN KEY FK_5C1D5F693B381CBC');
        $this->addSql('ALTER TABLE poi_concrete_processes DROP FOREIGN KEY FK_40D81D8BBF396750');
        $this->addSql('ALTER TABLE scenario_concrete_processes DROP FOREIGN KEY FK_97647485BF396750');
        $this->addSql('ALTER TABLE step_concrete_processes DROP FOREIGN KEY FK_6F04FF2CBF396750');
        $this->addSql('ALTER TABLE workflow_concrete_processes DROP FOREIGN KEY FK_68205222BF396750');
        $this->addSql('CREATE TABLE processes (id INT UNSIGNED AUTO_INCREMENT NOT NULL, parent_id INT UNSIGNED DEFAULT NULL, state VARCHAR(255) DEFAULT \'unknown\' NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, type VARCHAR(255) NOT NULL, INDEX fk_process_process_idx (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE access_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE completion_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poi_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workflow_processes (id INT UNSIGNED NOT NULL, workflow_id INT UNSIGNED DEFAULT NULL, chat_id INT UNSIGNED NOT NULL, INDEX fk_workflow_process_workflow_idx (workflow_id), INDEX fk_workflow_process_chat_idx (chat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE processes ADD CONSTRAINT FK_A4289E4C727ACA70 FOREIGN KEY (parent_id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE access_processes ADD CONSTRAINT FK_F59B8BB7BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE completion_processes ADD CONSTRAINT FK_109AB3CFBF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE poi_processes ADD CONSTRAINT FK_CEE136E5BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_processes ADD CONSTRAINT FK_3F4C433ABF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE step_processes ADD CONSTRAINT FK_7915E787BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workflow_processes ADD CONSTRAINT FK_598104C92C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflow_plans (id)');
        $this->addSql('ALTER TABLE workflow_processes ADD CONSTRAINT FK_598104C91A9A7125 FOREIGN KEY (chat_id) REFERENCES chats (id)');
        $this->addSql('ALTER TABLE workflow_processes ADD CONSTRAINT FK_598104C9BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE access_concrete_processes');
        $this->addSql('DROP TABLE completion_concrete_processes');
        $this->addSql('DROP TABLE concrete_processes');
        $this->addSql('DROP TABLE poi_concrete_processes');
        $this->addSql('DROP TABLE scenario_concrete_processes');
        $this->addSql('DROP TABLE step_concrete_processes');
        $this->addSql('DROP TABLE workflow_concrete_processes');
        $this->addSql('DROP INDEX fk_loop_concrete_process_idx ON loops');
        $this->addSql('ALTER TABLE loops CHANGE concrete_process_id process_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE loops ADD CONSTRAINT FK_5C1D5F697EC2F574 FOREIGN KEY (process_id) REFERENCES processes (id)');
        $this->addSql('CREATE INDEX fk_loop_process_idx ON loops (process_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE processes DROP FOREIGN KEY FK_A4289E4C727ACA70');
        $this->addSql('ALTER TABLE loops DROP FOREIGN KEY FK_5C1D5F697EC2F574');
        $this->addSql('ALTER TABLE access_processes DROP FOREIGN KEY FK_F59B8BB7BF396750');
        $this->addSql('ALTER TABLE completion_processes DROP FOREIGN KEY FK_109AB3CFBF396750');
        $this->addSql('ALTER TABLE poi_processes DROP FOREIGN KEY FK_CEE136E5BF396750');
        $this->addSql('ALTER TABLE scenario_processes DROP FOREIGN KEY FK_3F4C433ABF396750');
        $this->addSql('ALTER TABLE step_processes DROP FOREIGN KEY FK_7915E787BF396750');
        $this->addSql('ALTER TABLE workflow_processes DROP FOREIGN KEY FK_598104C9BF396750');
        $this->addSql('CREATE TABLE access_concrete_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE completion_concrete_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concrete_processes (id INT UNSIGNED AUTO_INCREMENT NOT NULL, parent_id INT UNSIGNED DEFAULT NULL, state VARCHAR(255) DEFAULT \'unknown\' NOT NULL COLLATE utf8mb4_unicode_ci, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX fk_concrete_process_concrete_process_idx (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poi_concrete_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_concrete_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step_concrete_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workflow_concrete_processes (id INT UNSIGNED NOT NULL, workflow_id INT UNSIGNED DEFAULT NULL, chat_id INT UNSIGNED NOT NULL, INDEX fk_workflow_concrete_process_workflow_idx (workflow_id), INDEX fk_workflow_concrete_process_chat_idx (chat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE access_concrete_processes ADD CONSTRAINT FK_772ACF06BF396750 FOREIGN KEY (id) REFERENCES concrete_processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE completion_concrete_processes ADD CONSTRAINT FK_8A876786BF396750 FOREIGN KEY (id) REFERENCES concrete_processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE concrete_processes ADD CONSTRAINT FK_819D2361727ACA70 FOREIGN KEY (parent_id) REFERENCES concrete_processes (id)');
        $this->addSql('ALTER TABLE poi_concrete_processes ADD CONSTRAINT FK_40D81D8BBF396750 FOREIGN KEY (id) REFERENCES concrete_processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_concrete_processes ADD CONSTRAINT FK_97647485BF396750 FOREIGN KEY (id) REFERENCES concrete_processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE step_concrete_processes ADD CONSTRAINT FK_6F04FF2CBF396750 FOREIGN KEY (id) REFERENCES concrete_processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workflow_concrete_processes ADD CONSTRAINT FK_682052221A9A7125 FOREIGN KEY (chat_id) REFERENCES chats (id)');
        $this->addSql('ALTER TABLE workflow_concrete_processes ADD CONSTRAINT FK_682052222C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflow_plans (id)');
        $this->addSql('ALTER TABLE workflow_concrete_processes ADD CONSTRAINT FK_68205222BF396750 FOREIGN KEY (id) REFERENCES concrete_processes (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE processes');
        $this->addSql('DROP TABLE access_processes');
        $this->addSql('DROP TABLE completion_processes');
        $this->addSql('DROP TABLE poi_processes');
        $this->addSql('DROP TABLE scenario_processes');
        $this->addSql('DROP TABLE step_processes');
        $this->addSql('DROP TABLE workflow_processes');
        $this->addSql('DROP INDEX fk_loop_process_idx ON loops');
        $this->addSql('ALTER TABLE loops CHANGE process_id concrete_process_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE loops ADD CONSTRAINT FK_5C1D5F693B381CBC FOREIGN KEY (concrete_process_id) REFERENCES concrete_processes (id)');
        $this->addSql('CREATE INDEX fk_loop_concrete_process_idx ON loops (concrete_process_id)');
    }
}
