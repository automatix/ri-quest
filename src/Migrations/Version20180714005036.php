<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180714005036 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE quests DROP FOREIGN KEY FK_989E5D34E04E49DF');
        $this->addSql('DROP INDEX fk_quest_scenario_idx ON quests');
        $this->addSql('ALTER TABLE quests CHANGE scenario_id workflow_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE quests ADD CONSTRAINT FK_989E5D342C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflows (id)');
        $this->addSql('CREATE INDEX fk_quest_workflow_idx ON quests (workflow_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE quests DROP FOREIGN KEY FK_989E5D342C7C2CBA');
        $this->addSql('DROP INDEX fk_quest_workflow_idx ON quests');
        $this->addSql('ALTER TABLE quests CHANGE workflow_id scenario_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE quests ADD CONSTRAINT FK_989E5D34E04E49DF FOREIGN KEY (scenario_id) REFERENCES scenarios (id)');
        $this->addSql('CREATE INDEX fk_quest_scenario_idx ON quests (scenario_id)');
    }
}
