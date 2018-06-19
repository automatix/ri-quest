<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180619155535 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tasks ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE fun_tasks DROP FOREIGN KEY FK_9DEB6C64BF396750');
        $this->addSql('ALTER TABLE fun_tasks ADD CONSTRAINT FK_9DEB6C64BF396750 FOREIGN KEY (id) REFERENCES tasks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE processes ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE info_steps DROP FOREIGN KEY FK_3E7BCF87BF396750');
        $this->addSql('ALTER TABLE info_steps ADD CONSTRAINT FK_3E7BCF87BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_steps DROP FOREIGN KEY FK_9D541151BF396750');
        $this->addSql('ALTER TABLE place_steps ADD CONSTRAINT FK_9D541151BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pois DROP FOREIGN KEY FK_74C303F5BF396750');
        $this->addSql('ALTER TABLE pois ADD CONSTRAINT FK_74C303F5BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question_tasks DROP FOREIGN KEY FK_60B37493BF396750');
        $this->addSql('ALTER TABLE question_tasks ADD CONSTRAINT FK_60B37493BF396750 FOREIGN KEY (id) REFERENCES tasks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenarios DROP FOREIGN KEY FK_9338D025BF396750');
        $this->addSql('ALTER TABLE scenarios ADD CONSTRAINT FK_9338D025BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task_steps DROP FOREIGN KEY FK_F3861152BF396750');
        $this->addSql('ALTER TABLE task_steps ADD CONSTRAINT FK_F3861152BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fun_tasks DROP FOREIGN KEY FK_9DEB6C64BF396750');
        $this->addSql('ALTER TABLE fun_tasks ADD CONSTRAINT FK_9DEB6C64BF396750 FOREIGN KEY (id) REFERENCES tasks (id)');
        $this->addSql('ALTER TABLE info_steps DROP FOREIGN KEY FK_3E7BCF87BF396750');
        $this->addSql('ALTER TABLE info_steps ADD CONSTRAINT FK_3E7BCF87BF396750 FOREIGN KEY (id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE place_steps DROP FOREIGN KEY FK_9D541151BF396750');
        $this->addSql('ALTER TABLE place_steps ADD CONSTRAINT FK_9D541151BF396750 FOREIGN KEY (id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE pois DROP FOREIGN KEY FK_74C303F5BF396750');
        $this->addSql('ALTER TABLE pois ADD CONSTRAINT FK_74C303F5BF396750 FOREIGN KEY (id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE processes DROP type');
        $this->addSql('ALTER TABLE question_tasks DROP FOREIGN KEY FK_60B37493BF396750');
        $this->addSql('ALTER TABLE question_tasks ADD CONSTRAINT FK_60B37493BF396750 FOREIGN KEY (id) REFERENCES tasks (id)');
        $this->addSql('ALTER TABLE scenarios DROP FOREIGN KEY FK_9338D025BF396750');
        $this->addSql('ALTER TABLE scenarios ADD CONSTRAINT FK_9338D025BF396750 FOREIGN KEY (id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE task_steps DROP FOREIGN KEY FK_F3861152BF396750');
        $this->addSql('ALTER TABLE task_steps ADD CONSTRAINT FK_F3861152BF396750 FOREIGN KEY (id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE tasks DROP type');
    }
}
