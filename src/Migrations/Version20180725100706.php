<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180725100706 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE access_concrete_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE completion_concrete_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poi_concrete_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_concrete_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step_concrete_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workflow_concrete_processes (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE access_concrete_processes ADD CONSTRAINT FK_772ACF06BF396750 FOREIGN KEY (id) REFERENCES concrete_processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE completion_concrete_processes ADD CONSTRAINT FK_8A876786BF396750 FOREIGN KEY (id) REFERENCES concrete_processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE poi_concrete_processes ADD CONSTRAINT FK_40D81D8BBF396750 FOREIGN KEY (id) REFERENCES concrete_processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_concrete_processes ADD CONSTRAINT FK_97647485BF396750 FOREIGN KEY (id) REFERENCES concrete_processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE step_concrete_processes ADD CONSTRAINT FK_6F04FF2CBF396750 FOREIGN KEY (id) REFERENCES concrete_processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workflow_concrete_processes ADD CONSTRAINT FK_68205222BF396750 FOREIGN KEY (id) REFERENCES concrete_processes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE access_concrete_processes');
        $this->addSql('DROP TABLE completion_concrete_processes');
        $this->addSql('DROP TABLE poi_concrete_processes');
        $this->addSql('DROP TABLE scenario_concrete_processes');
        $this->addSql('DROP TABLE step_concrete_processes');
        $this->addSql('DROP TABLE workflow_concrete_processes');
    }
}
