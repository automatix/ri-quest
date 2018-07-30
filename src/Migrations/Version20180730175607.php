<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180730175607 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plans RENAME INDEX fk_process_process_idx TO fk_plan_plan_idx');
        $this->addSql('ALTER TABLE process_process_message_stack DROP FOREIGN KEY FK_12130B1C7EC2F574');
        $this->addSql('ALTER TABLE process_process_message_stack DROP FOREIGN KEY FK_12130B1CCB20BC9E');
        $this->addSql('DROP INDEX IDX_12130B1C7EC2F574 ON process_process_message_stack');
        $this->addSql('DROP INDEX IDX_12130B1CCB20BC9E ON process_process_message_stack');
        $this->addSql('ALTER TABLE process_process_message_stack DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE process_process_message_stack ADD plan_id INT UNSIGNED NOT NULL, ADD plan_message_stack_id INT UNSIGNED NOT NULL, DROP process_id, DROP process_message_stack_id');
        $this->addSql('ALTER TABLE process_process_message_stack ADD CONSTRAINT FK_12130B1CE899029B FOREIGN KEY (plan_id) REFERENCES plans (id)');
        $this->addSql('ALTER TABLE process_process_message_stack ADD CONSTRAINT FK_12130B1C89BCF27D FOREIGN KEY (plan_message_stack_id) REFERENCES process_message_stacks (id)');
        $this->addSql('CREATE INDEX IDX_12130B1CE899029B ON process_process_message_stack (plan_id)');
        $this->addSql('CREATE INDEX IDX_12130B1C89BCF27D ON process_process_message_stack (plan_message_stack_id)');
        $this->addSql('ALTER TABLE process_process_message_stack ADD PRIMARY KEY (plan_id, plan_message_stack_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plans RENAME INDEX fk_plan_plan_idx TO fk_process_process_idx');
        $this->addSql('ALTER TABLE process_process_message_stack DROP FOREIGN KEY FK_12130B1CE899029B');
        $this->addSql('ALTER TABLE process_process_message_stack DROP FOREIGN KEY FK_12130B1C89BCF27D');
        $this->addSql('DROP INDEX IDX_12130B1CE899029B ON process_process_message_stack');
        $this->addSql('DROP INDEX IDX_12130B1C89BCF27D ON process_process_message_stack');
        $this->addSql('ALTER TABLE process_process_message_stack DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE process_process_message_stack ADD process_id INT UNSIGNED NOT NULL, ADD process_message_stack_id INT UNSIGNED NOT NULL, DROP plan_id, DROP plan_message_stack_id');
        $this->addSql('ALTER TABLE process_process_message_stack ADD CONSTRAINT FK_12130B1C7EC2F574 FOREIGN KEY (process_id) REFERENCES plans (id)');
        $this->addSql('ALTER TABLE process_process_message_stack ADD CONSTRAINT FK_12130B1CCB20BC9E FOREIGN KEY (process_message_stack_id) REFERENCES process_message_stacks (id)');
        $this->addSql('CREATE INDEX IDX_12130B1C7EC2F574 ON process_process_message_stack (process_id)');
        $this->addSql('CREATE INDEX IDX_12130B1CCB20BC9E ON process_process_message_stack (process_message_stack_id)');
        $this->addSql('ALTER TABLE process_process_message_stack ADD PRIMARY KEY (process_id, process_message_stack_id)');
    }
}
