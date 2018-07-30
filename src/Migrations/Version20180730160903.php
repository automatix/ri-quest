<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180730160903 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plan_plan_message_stack DROP FOREIGN KEY FK_D300F57A89BCF27D');
        $this->addSql('ALTER TABLE accesses DROP FOREIGN KEY FK_E234CAE2BF396750');
        $this->addSql('ALTER TABLE completions DROP FOREIGN KEY FK_AC8B4507BF396750');
        $this->addSql('ALTER TABLE info_steps DROP FOREIGN KEY FK_3E7BCF87BF396750');
        $this->addSql('ALTER TABLE plan_plan_message_stack DROP FOREIGN KEY FK_D300F57AE899029B');
        $this->addSql('ALTER TABLE plans DROP FOREIGN KEY FK_356798D1727ACA70');
        $this->addSql('ALTER TABLE pois DROP FOREIGN KEY FK_74C303F5BF396750');
        $this->addSql('ALTER TABLE scenarios DROP FOREIGN KEY FK_9338D025BF396750');
        $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_34220A72BF396750');
        $this->addSql('CREATE TABLE processes (id INT UNSIGNED AUTO_INCREMENT NOT NULL, parent_id INT UNSIGNED DEFAULT NULL, `order` INT NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, type VARCHAR(255) NOT NULL, INDEX fk_process_process_idx (parent_id), UNIQUE INDEX uq_unique_order_for_process (parent_id, `order`), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE process_process_message_stack (process_id INT UNSIGNED NOT NULL, process_message_stack_id INT UNSIGNED NOT NULL, INDEX IDX_12130B1C7EC2F574 (process_id), INDEX IDX_12130B1CCB20BC9E (process_message_stack_id), PRIMARY KEY(process_id, process_message_stack_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE process_message_stacks (id INT UNSIGNED NOT NULL, process VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, event VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE processes ADD CONSTRAINT FK_A4289E4C727ACA70 FOREIGN KEY (parent_id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE process_process_message_stack ADD CONSTRAINT FK_12130B1C7EC2F574 FOREIGN KEY (process_id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE process_process_message_stack ADD CONSTRAINT FK_12130B1CCB20BC9E FOREIGN KEY (process_message_stack_id) REFERENCES process_message_stacks (id)');
        $this->addSql('ALTER TABLE process_message_stacks ADD CONSTRAINT FK_5C53BA4EBF396750 FOREIGN KEY (id) REFERENCES message_stacks (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE plan_message_stacks');
        $this->addSql('DROP TABLE plan_plan_message_stack');
        $this->addSql('DROP TABLE plans');
        // duplicate
        // $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_34220A72BF396750');
        $this->addSql('ALTER TABLE steps ADD CONSTRAINT FK_34220A72BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        // duplicate
        // $this->addSql('ALTER TABLE accesses DROP FOREIGN KEY FK_E234CAE2BF396750');
        $this->addSql('ALTER TABLE accesses ADD CONSTRAINT FK_E234CAE2BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        // duplicate
        // $this->addSql('ALTER TABLE completions DROP FOREIGN KEY FK_AC8B4507BF396750');
        $this->addSql('ALTER TABLE completions ADD CONSTRAINT FK_AC8B4507BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        // duplicate
        // $this->addSql('ALTER TABLE pois DROP FOREIGN KEY FK_74C303F5BF396750');
        $this->addSql('ALTER TABLE pois ADD CONSTRAINT FK_74C303F5BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        // duplicate
        // $this->addSql('ALTER TABLE scenarios DROP FOREIGN KEY FK_9338D025BF396750');
        $this->addSql('ALTER TABLE scenarios ADD CONSTRAINT FK_9338D025BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        // duplicate
        // $this->addSql('ALTER TABLE info_steps DROP FOREIGN KEY FK_3E7BCF87BF396750');
        $this->addSql('ALTER TABLE info_steps ADD CONSTRAINT FK_3E7BCF87BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_steps ADD CONSTRAINT FK_9D541151BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task_steps ADD CONSTRAINT FK_F3861152BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workflows ADD CONSTRAINT FK_EFBFBFC2BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE processes DROP FOREIGN KEY FK_A4289E4C727ACA70');
        $this->addSql('ALTER TABLE process_process_message_stack DROP FOREIGN KEY FK_12130B1C7EC2F574');
        $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_34220A72BF396750');
        $this->addSql('ALTER TABLE accesses DROP FOREIGN KEY FK_E234CAE2BF396750');
        $this->addSql('ALTER TABLE completions DROP FOREIGN KEY FK_AC8B4507BF396750');
        $this->addSql('ALTER TABLE pois DROP FOREIGN KEY FK_74C303F5BF396750');
        $this->addSql('ALTER TABLE scenarios DROP FOREIGN KEY FK_9338D025BF396750');
        $this->addSql('ALTER TABLE info_steps DROP FOREIGN KEY FK_3E7BCF87BF396750');
        $this->addSql('ALTER TABLE place_steps DROP FOREIGN KEY FK_9D541151BF396750');
        $this->addSql('ALTER TABLE task_steps DROP FOREIGN KEY FK_F3861152BF396750');
        $this->addSql('ALTER TABLE workflows DROP FOREIGN KEY FK_EFBFBFC2BF396750');
        $this->addSql('ALTER TABLE process_process_message_stack DROP FOREIGN KEY FK_12130B1CCB20BC9E');
        $this->addSql('CREATE TABLE plan_message_stacks (id INT UNSIGNED NOT NULL, plan VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, state VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, event VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan_plan_message_stack (plan_id INT UNSIGNED NOT NULL, plan_message_stack_id INT UNSIGNED NOT NULL, INDEX IDX_D300F57AE899029B (plan_id), INDEX IDX_D300F57A89BCF27D (plan_message_stack_id), PRIMARY KEY(plan_id, plan_message_stack_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plans (id INT UNSIGNED AUTO_INCREMENT NOT NULL, parent_id INT UNSIGNED DEFAULT NULL, `order` INT NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, UNIQUE INDEX uq_unique_order_for_plan (parent_id, `order`), INDEX fk_plan_plan_idx (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plan_message_stacks ADD CONSTRAINT FK_3ED11233BF396750 FOREIGN KEY (id) REFERENCES message_stacks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plan_plan_message_stack ADD CONSTRAINT FK_D300F57A89BCF27D FOREIGN KEY (plan_message_stack_id) REFERENCES plan_message_stacks (id)');
        $this->addSql('ALTER TABLE plan_plan_message_stack ADD CONSTRAINT FK_D300F57AE899029B FOREIGN KEY (plan_id) REFERENCES plans (id)');
        $this->addSql('ALTER TABLE plans ADD CONSTRAINT FK_356798D1727ACA70 FOREIGN KEY (parent_id) REFERENCES plans (id)');
        $this->addSql('DROP TABLE processes');
        $this->addSql('DROP TABLE process_process_message_stack');
        $this->addSql('DROP TABLE process_message_stacks');
        // duplicate
        // $this->addSql('ALTER TABLE accesses DROP FOREIGN KEY FK_E234CAE2BF396750');
        $this->addSql('ALTER TABLE accesses ADD CONSTRAINT FK_E234CAE2BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        // duplicate
        // $this->addSql('ALTER TABLE completions DROP FOREIGN KEY FK_AC8B4507BF396750');
        $this->addSql('ALTER TABLE completions ADD CONSTRAINT FK_AC8B4507BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        // duplicate
        // $this->addSql('ALTER TABLE info_steps DROP FOREIGN KEY FK_3E7BCF87BF396750');
        $this->addSql('ALTER TABLE info_steps ADD CONSTRAINT FK_3E7BCF87BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        // duplicate
        // $this->addSql('ALTER TABLE pois DROP FOREIGN KEY FK_74C303F5BF396750');
        $this->addSql('ALTER TABLE pois ADD CONSTRAINT FK_74C303F5BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        // duplicate
        // $this->addSql('ALTER TABLE scenarios DROP FOREIGN KEY FK_9338D025BF396750');
        $this->addSql('ALTER TABLE scenarios ADD CONSTRAINT FK_9338D025BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
        // duplicate
        // $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_34220A72BF396750');
        $this->addSql('ALTER TABLE steps ADD CONSTRAINT FK_34220A72BF396750 FOREIGN KEY (id) REFERENCES plans (id) ON DELETE CASCADE');
    }
}
