<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180730171739 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accesses DROP FOREIGN KEY FK_E234CAE2BF396750');
        $this->addSql('ALTER TABLE completions DROP FOREIGN KEY FK_AC8B4507BF396750');
        $this->addSql('ALTER TABLE info_steps DROP FOREIGN KEY FK_3E7BCF87BF396750');
        $this->addSql('ALTER TABLE place_steps DROP FOREIGN KEY FK_9D541151BF396750');
        $this->addSql('ALTER TABLE pois DROP FOREIGN KEY FK_74C303F5BF396750');
        $this->addSql('ALTER TABLE process_process_message_stack DROP FOREIGN KEY FK_12130B1C7EC2F574');
        $this->addSql('ALTER TABLE processes DROP FOREIGN KEY FK_A4289E4C727ACA70');
        $this->addSql('ALTER TABLE scenarios DROP FOREIGN KEY FK_9338D025BF396750');
        $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_34220A72BF396750');
        $this->addSql('ALTER TABLE task_steps DROP FOREIGN KEY FK_F3861152BF396750');
        $this->addSql('ALTER TABLE workflows DROP FOREIGN KEY FK_EFBFBFC2BF396750');
        $this->addSql('ALTER TABLE tasks DROP FOREIGN KEY FK_505865976C533476');
        $this->addSql('ALTER TABLE workflow_concrete_processes DROP FOREIGN KEY FK_682052222C7C2CBA');
        $this->addSql('CREATE TABLE plans (id INT UNSIGNED AUTO_INCREMENT NOT NULL, parent_id INT UNSIGNED DEFAULT NULL, `order` INT NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, type VARCHAR(255) NOT NULL, INDEX fk_process_process_idx (parent_id), UNIQUE INDEX uq_unique_order_for_process (parent_id, `order`), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step_plans (id INT UNSIGNED NOT NULL, step_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE access_plans (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE completion_plans (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poi_plans (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_plans (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_step_plans (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_step_plans (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task_step_plans (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workflow_plans (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plans ADD CONSTRAINT FK_356798D1727ACA70 FOREIGN KEY (parent_id) REFERENCES plans (id)');
        $this->addSql('ALTER TABLE step_plans ADD CONSTRAINT FK_29456F2EBF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE access_plans ADD CONSTRAINT FK_DCF2E482BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE completion_plans ADD CONSTRAINT FK_B4312E07BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE poi_plans ADD CONSTRAINT FK_FD2B9B4BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_plans ADD CONSTRAINT FK_1A682980BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE info_step_plans ADD CONSTRAINT FK_71805382BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_step_plans ADD CONSTRAINT FK_785F926BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task_step_plans ADD CONSTRAINT FK_35562481BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workflow_plans ADD CONSTRAINT FK_8429EEE5BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE accesses');
        $this->addSql('DROP TABLE completions');
        $this->addSql('DROP TABLE info_steps');
        $this->addSql('DROP TABLE place_steps');
        $this->addSql('DROP TABLE pois');
        $this->addSql('DROP TABLE processes');
        $this->addSql('DROP TABLE scenarios');
        $this->addSql('DROP TABLE steps');
        $this->addSql('DROP TABLE task_steps');
        $this->addSql('DROP TABLE workflows');
        // duplicate
        // $this->addSql('ALTER TABLE process_process_message_stack DROP FOREIGN KEY FK_12130B1C7EC2F574');
        $this->addSql('ALTER TABLE process_process_message_stack ADD CONSTRAINT FK_12130B1C7EC2F574 FOREIGN KEY (process_id) REFERENCES plans (id)');
        // duplicate
        // $this->addSql('ALTER TABLE tasks DROP FOREIGN KEY FK_505865976C533476');
        $this->addSql('ALTER TABLE tasks ADD CONSTRAINT FK_505865976C533476 FOREIGN KEY (task_step_id) REFERENCES task_step_plans (id)');
        // duplicate
        // $this->addSql('ALTER TABLE workflow_concrete_processes DROP FOREIGN KEY FK_682052222C7C2CBA');
        $this->addSql('ALTER TABLE workflow_concrete_processes ADD CONSTRAINT FK_682052222C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflow_plans (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plans DROP FOREIGN KEY FK_356798D1727ACA70');
        $this->addSql('ALTER TABLE process_process_message_stack DROP FOREIGN KEY FK_12130B1C7EC2F574');
        $this->addSql('ALTER TABLE step_plans DROP FOREIGN KEY FK_29456F2EBF396750');
        $this->addSql('ALTER TABLE access_plans DROP FOREIGN KEY FK_DCF2E482BF396750');
        $this->addSql('ALTER TABLE completion_plans DROP FOREIGN KEY FK_B4312E07BF396750');
        $this->addSql('ALTER TABLE poi_plans DROP FOREIGN KEY FK_FD2B9B4BF396750');
        $this->addSql('ALTER TABLE scenario_plans DROP FOREIGN KEY FK_1A682980BF396750');
        $this->addSql('ALTER TABLE info_step_plans DROP FOREIGN KEY FK_71805382BF396750');
        $this->addSql('ALTER TABLE place_step_plans DROP FOREIGN KEY FK_785F926BF396750');
        $this->addSql('ALTER TABLE task_step_plans DROP FOREIGN KEY FK_35562481BF396750');
        $this->addSql('ALTER TABLE workflow_plans DROP FOREIGN KEY FK_8429EEE5BF396750');
        $this->addSql('ALTER TABLE tasks DROP FOREIGN KEY FK_505865976C533476');
        $this->addSql('ALTER TABLE workflow_concrete_processes DROP FOREIGN KEY FK_682052222C7C2CBA');
        $this->addSql('CREATE TABLE accesses (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE completions (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_steps (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_steps (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pois (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE processes (id INT UNSIGNED AUTO_INCREMENT NOT NULL, parent_id INT UNSIGNED DEFAULT NULL, `order` INT NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, UNIQUE INDEX uq_unique_order_for_process (parent_id, `order`), INDEX fk_process_process_idx (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenarios (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE steps (id INT UNSIGNED NOT NULL, step_type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task_steps (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workflows (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accesses ADD CONSTRAINT FK_E234CAE2BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE completions ADD CONSTRAINT FK_AC8B4507BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE info_steps ADD CONSTRAINT FK_3E7BCF87BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_steps ADD CONSTRAINT FK_9D541151BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pois ADD CONSTRAINT FK_74C303F5BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE processes ADD CONSTRAINT FK_A4289E4C727ACA70 FOREIGN KEY (parent_id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE scenarios ADD CONSTRAINT FK_9338D025BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE steps ADD CONSTRAINT FK_34220A72BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task_steps ADD CONSTRAINT FK_F3861152BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workflows ADD CONSTRAINT FK_EFBFBFC2BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE plans');
        $this->addSql('DROP TABLE step_plans');
        $this->addSql('DROP TABLE access_plans');
        $this->addSql('DROP TABLE completion_plans');
        $this->addSql('DROP TABLE poi_plans');
        $this->addSql('DROP TABLE scenario_plans');
        $this->addSql('DROP TABLE info_step_plans');
        $this->addSql('DROP TABLE place_step_plans');
        $this->addSql('DROP TABLE task_step_plans');
        $this->addSql('DROP TABLE workflow_plans');
        // duplicate
        // $this->addSql('ALTER TABLE process_process_message_stack DROP FOREIGN KEY FK_12130B1C7EC2F574');
        $this->addSql('ALTER TABLE process_process_message_stack ADD CONSTRAINT FK_12130B1C7EC2F574 FOREIGN KEY (process_id) REFERENCES processes (id)');
        // duplicate
        // $this->addSql('ALTER TABLE tasks DROP FOREIGN KEY FK_505865976C533476');
        $this->addSql('ALTER TABLE tasks ADD CONSTRAINT FK_505865976C533476 FOREIGN KEY (task_step_id) REFERENCES task_steps (id)');
        // duplicate
        // $this->addSql('ALTER TABLE workflow_concrete_processes DROP FOREIGN KEY FK_682052222C7C2CBA');
        $this->addSql('ALTER TABLE workflow_concrete_processes ADD CONSTRAINT FK_682052222C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflows (id)');
    }
}
