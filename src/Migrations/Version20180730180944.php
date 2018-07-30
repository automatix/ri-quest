<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180730180944 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE process_process_message_stack DROP FOREIGN KEY FK_12130B1C89BCF27D');
        $this->addSql('CREATE TABLE plan_plan_message_stacks (plan_id INT UNSIGNED NOT NULL, plan_message_stack_id INT UNSIGNED NOT NULL, INDEX IDX_AB0D57DCE899029B (plan_id), INDEX IDX_AB0D57DC89BCF27D (plan_message_stack_id), PRIMARY KEY(plan_id, plan_message_stack_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan_message_stacks (id INT UNSIGNED NOT NULL, plan VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, event VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plan_plan_message_stacks ADD CONSTRAINT FK_AB0D57DCE899029B FOREIGN KEY (plan_id) REFERENCES plans (id)');
        $this->addSql('ALTER TABLE plan_plan_message_stacks ADD CONSTRAINT FK_AB0D57DC89BCF27D FOREIGN KEY (plan_message_stack_id) REFERENCES plan_message_stacks (id)');
        $this->addSql('ALTER TABLE plan_message_stacks ADD CONSTRAINT FK_3ED11233BF396750 FOREIGN KEY (id) REFERENCES message_stacks (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE process_message_stacks');
        $this->addSql('DROP TABLE process_process_message_stack');
        $this->addSql('ALTER TABLE plans RENAME INDEX uq_unique_order_for_process TO uq_unique_order_for_plan');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plan_plan_message_stacks DROP FOREIGN KEY FK_AB0D57DC89BCF27D');
        $this->addSql('CREATE TABLE process_message_stacks (id INT UNSIGNED NOT NULL, process VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, state VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, event VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE process_process_message_stack (plan_id INT UNSIGNED NOT NULL, plan_message_stack_id INT UNSIGNED NOT NULL, INDEX IDX_12130B1CE899029B (plan_id), INDEX IDX_12130B1C89BCF27D (plan_message_stack_id), PRIMARY KEY(plan_id, plan_message_stack_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE process_message_stacks ADD CONSTRAINT FK_5C53BA4EBF396750 FOREIGN KEY (id) REFERENCES message_stacks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE process_process_message_stack ADD CONSTRAINT FK_12130B1C89BCF27D FOREIGN KEY (plan_message_stack_id) REFERENCES process_message_stacks (id)');
        $this->addSql('ALTER TABLE process_process_message_stack ADD CONSTRAINT FK_12130B1CE899029B FOREIGN KEY (plan_id) REFERENCES plans (id)');
        $this->addSql('DROP TABLE plan_plan_message_stacks');
        $this->addSql('DROP TABLE plan_message_stacks');
        $this->addSql('ALTER TABLE plans RENAME INDEX uq_unique_order_for_plan TO uq_unique_order_for_process');
    }
}
