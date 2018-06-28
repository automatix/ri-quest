<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180628203157 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE answers (id INT UNSIGNED AUTO_INCREMENT NOT NULL, question_id INT UNSIGNED NOT NULL, text VARCHAR(50) NOT NULL, `type` VARCHAR(255) DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, INDEX fk_answer_question_idx (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answers_semantical_message_stacks (answer_id INT UNSIGNED NOT NULL, semantical_message_stack_id INT UNSIGNED NOT NULL, INDEX IDX_E8647BEAAA334807 (answer_id), INDEX IDX_E8647BEA52A3CB2F (semantical_message_stack_id), PRIMARY KEY(answer_id, semantical_message_stack_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concrete_processes (id INT UNSIGNED AUTO_INCREMENT NOT NULL, parent_id INT UNSIGNED DEFAULT NULL, state VARCHAR(255) DEFAULT \'unknown\' NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, `type` VARCHAR(255) NOT NULL, INDEX fk_concrete_process_concrete_process_idx (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_blocks (id INT UNSIGNED AUTO_INCREMENT NOT NULL, message_id INT UNSIGNED NOT NULL, `order` INT DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, `type` VARCHAR(255) NOT NULL, INDEX fk_content_block_message_idx (message_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE audio_content_blocks (id INT UNSIGNED NOT NULL, src VARCHAR(1000) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_content_blocks (id INT UNSIGNED NOT NULL, src VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE link_content_blocks (id INT UNSIGNED NOT NULL, text VARCHAR(1000) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE text_content_blocks (id INT UNSIGNED NOT NULL, text VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video_content_blocks (id INT UNSIGNED NOT NULL, src VARCHAR(1000) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (id INT UNSIGNED AUTO_INCREMENT NOT NULL, message_stack_id INT UNSIGNED NOT NULL, `order` INT DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, INDEX fk_message_message_stack_idx (message_stack_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_stacks (id INT UNSIGNED AUTO_INCREMENT NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, `type` VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE process_message_stacks (id INT UNSIGNED NOT NULL, processx VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, event VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semantical_message_stacks (id INT UNSIGNED NOT NULL, semantic VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE processes (id INT UNSIGNED AUTO_INCREMENT NOT NULL, parent_id INT UNSIGNED DEFAULT NULL, `order` INT NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, `type` VARCHAR(255) NOT NULL, INDEX fk_process_process_idx (parent_id), UNIQUE INDEX uq_unique_order_for_process (parent_id, `order`), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE process_process_message_stack (process_id INT UNSIGNED NOT NULL, process_message_stack_id INT UNSIGNED NOT NULL, INDEX IDX_12130B1C7EC2F574 (process_id), INDEX IDX_12130B1CCB20BC9E (process_message_stack_id), PRIMARY KEY(process_id, process_message_stack_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pois (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenarios (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE steps (id INT UNSIGNED NOT NULL, step_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_steps (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_steps (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task_steps (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quests (id INT UNSIGNED AUTO_INCREMENT NOT NULL, concrete_process_id INT UNSIGNED NOT NULL, scenario_id INT UNSIGNED NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, INDEX fk_quest_scenario_idx (scenario_id), INDEX fk_quest_concrete_process_idx (concrete_process_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tasks (id INT UNSIGNED AUTO_INCREMENT NOT NULL, task_step_id INT UNSIGNED NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, `type` VARCHAR(255) NOT NULL, INDEX fk_task_task_step_idx (task_step_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tasks_semantical_message_stacks (task_id INT UNSIGNED NOT NULL, semantical_message_stack_id INT UNSIGNED NOT NULL, INDEX IDX_40B34EEA8DB60186 (task_id), INDEX IDX_40B34EEA52A3CB2F (semantical_message_stack_id), PRIMARY KEY(task_id, semantical_message_stack_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fun_tasks (id INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_tasks (id INT UNSIGNED NOT NULL, text VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answers ADD CONSTRAINT FK_50D0C6061E27F6BF FOREIGN KEY (question_id) REFERENCES question_tasks (id)');
        $this->addSql('ALTER TABLE answers_semantical_message_stacks ADD CONSTRAINT FK_E8647BEAAA334807 FOREIGN KEY (answer_id) REFERENCES answers (id)');
        $this->addSql('ALTER TABLE answers_semantical_message_stacks ADD CONSTRAINT FK_E8647BEA52A3CB2F FOREIGN KEY (semantical_message_stack_id) REFERENCES semantical_message_stacks (id)');
        $this->addSql('ALTER TABLE concrete_processes ADD CONSTRAINT FK_819D2361727ACA70 FOREIGN KEY (parent_id) REFERENCES concrete_processes (id)');
        $this->addSql('ALTER TABLE content_blocks ADD CONSTRAINT FK_A6DBE5D4537A1329 FOREIGN KEY (message_id) REFERENCES messages (id)');
        $this->addSql('ALTER TABLE audio_content_blocks ADD CONSTRAINT FK_E718E1DEBF396750 FOREIGN KEY (id) REFERENCES content_blocks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_content_blocks ADD CONSTRAINT FK_314D32BEBF396750 FOREIGN KEY (id) REFERENCES content_blocks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE link_content_blocks ADD CONSTRAINT FK_B2AF2197BF396750 FOREIGN KEY (id) REFERENCES content_blocks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE text_content_blocks ADD CONSTRAINT FK_6C1D09C3BF396750 FOREIGN KEY (id) REFERENCES content_blocks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video_content_blocks ADD CONSTRAINT FK_8009AF54BF396750 FOREIGN KEY (id) REFERENCES content_blocks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E963EE1C471 FOREIGN KEY (message_stack_id) REFERENCES message_stacks (id)');
        $this->addSql('ALTER TABLE process_message_stacks ADD CONSTRAINT FK_5C53BA4EBF396750 FOREIGN KEY (id) REFERENCES message_stacks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semantical_message_stacks ADD CONSTRAINT FK_1F915555BF396750 FOREIGN KEY (id) REFERENCES message_stacks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE processes ADD CONSTRAINT FK_A4289E4C727ACA70 FOREIGN KEY (parent_id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE process_process_message_stack ADD CONSTRAINT FK_12130B1C7EC2F574 FOREIGN KEY (process_id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE process_process_message_stack ADD CONSTRAINT FK_12130B1CCB20BC9E FOREIGN KEY (process_message_stack_id) REFERENCES process_message_stacks (id)');
        $this->addSql('ALTER TABLE pois ADD CONSTRAINT FK_74C303F5BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenarios ADD CONSTRAINT FK_9338D025BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE steps ADD CONSTRAINT FK_34220A72BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE info_steps ADD CONSTRAINT FK_3E7BCF87BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_steps ADD CONSTRAINT FK_9D541151BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task_steps ADD CONSTRAINT FK_F3861152BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quests ADD CONSTRAINT FK_989E5D343B381CBC FOREIGN KEY (concrete_process_id) REFERENCES concrete_processes (id)');
        $this->addSql('ALTER TABLE quests ADD CONSTRAINT FK_989E5D34E04E49DF FOREIGN KEY (scenario_id) REFERENCES scenarios (id)');
        $this->addSql('ALTER TABLE tasks ADD CONSTRAINT FK_505865976C533476 FOREIGN KEY (task_step_id) REFERENCES task_steps (id)');
        $this->addSql('ALTER TABLE tasks_semantical_message_stacks ADD CONSTRAINT FK_40B34EEA8DB60186 FOREIGN KEY (task_id) REFERENCES tasks (id)');
        $this->addSql('ALTER TABLE tasks_semantical_message_stacks ADD CONSTRAINT FK_40B34EEA52A3CB2F FOREIGN KEY (semantical_message_stack_id) REFERENCES semantical_message_stacks (id)');
        $this->addSql('ALTER TABLE fun_tasks ADD CONSTRAINT FK_9DEB6C64BF396750 FOREIGN KEY (id) REFERENCES tasks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question_tasks ADD CONSTRAINT FK_60B37493BF396750 FOREIGN KEY (id) REFERENCES tasks (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE answers_semantical_message_stacks DROP FOREIGN KEY FK_E8647BEAAA334807');
        $this->addSql('ALTER TABLE concrete_processes DROP FOREIGN KEY FK_819D2361727ACA70');
        $this->addSql('ALTER TABLE quests DROP FOREIGN KEY FK_989E5D343B381CBC');
        $this->addSql('ALTER TABLE audio_content_blocks DROP FOREIGN KEY FK_E718E1DEBF396750');
        $this->addSql('ALTER TABLE image_content_blocks DROP FOREIGN KEY FK_314D32BEBF396750');
        $this->addSql('ALTER TABLE link_content_blocks DROP FOREIGN KEY FK_B2AF2197BF396750');
        $this->addSql('ALTER TABLE text_content_blocks DROP FOREIGN KEY FK_6C1D09C3BF396750');
        $this->addSql('ALTER TABLE video_content_blocks DROP FOREIGN KEY FK_8009AF54BF396750');
        $this->addSql('ALTER TABLE content_blocks DROP FOREIGN KEY FK_A6DBE5D4537A1329');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E963EE1C471');
        $this->addSql('ALTER TABLE process_message_stacks DROP FOREIGN KEY FK_5C53BA4EBF396750');
        $this->addSql('ALTER TABLE semantical_message_stacks DROP FOREIGN KEY FK_1F915555BF396750');
        $this->addSql('ALTER TABLE process_process_message_stack DROP FOREIGN KEY FK_12130B1CCB20BC9E');
        $this->addSql('ALTER TABLE answers_semantical_message_stacks DROP FOREIGN KEY FK_E8647BEA52A3CB2F');
        $this->addSql('ALTER TABLE tasks_semantical_message_stacks DROP FOREIGN KEY FK_40B34EEA52A3CB2F');
        $this->addSql('ALTER TABLE processes DROP FOREIGN KEY FK_A4289E4C727ACA70');
        $this->addSql('ALTER TABLE process_process_message_stack DROP FOREIGN KEY FK_12130B1C7EC2F574');
        $this->addSql('ALTER TABLE pois DROP FOREIGN KEY FK_74C303F5BF396750');
        $this->addSql('ALTER TABLE scenarios DROP FOREIGN KEY FK_9338D025BF396750');
        $this->addSql('ALTER TABLE steps DROP FOREIGN KEY FK_34220A72BF396750');
        $this->addSql('ALTER TABLE info_steps DROP FOREIGN KEY FK_3E7BCF87BF396750');
        $this->addSql('ALTER TABLE place_steps DROP FOREIGN KEY FK_9D541151BF396750');
        $this->addSql('ALTER TABLE task_steps DROP FOREIGN KEY FK_F3861152BF396750');
        $this->addSql('ALTER TABLE quests DROP FOREIGN KEY FK_989E5D34E04E49DF');
        $this->addSql('ALTER TABLE tasks DROP FOREIGN KEY FK_505865976C533476');
        $this->addSql('ALTER TABLE tasks_semantical_message_stacks DROP FOREIGN KEY FK_40B34EEA8DB60186');
        $this->addSql('ALTER TABLE fun_tasks DROP FOREIGN KEY FK_9DEB6C64BF396750');
        $this->addSql('ALTER TABLE question_tasks DROP FOREIGN KEY FK_60B37493BF396750');
        $this->addSql('ALTER TABLE answers DROP FOREIGN KEY FK_50D0C6061E27F6BF');
        $this->addSql('DROP TABLE answers');
        $this->addSql('DROP TABLE answers_semantical_message_stacks');
        $this->addSql('DROP TABLE concrete_processes');
        $this->addSql('DROP TABLE content_blocks');
        $this->addSql('DROP TABLE audio_content_blocks');
        $this->addSql('DROP TABLE image_content_blocks');
        $this->addSql('DROP TABLE link_content_blocks');
        $this->addSql('DROP TABLE text_content_blocks');
        $this->addSql('DROP TABLE video_content_blocks');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE message_stacks');
        $this->addSql('DROP TABLE process_message_stacks');
        $this->addSql('DROP TABLE semantical_message_stacks');
        $this->addSql('DROP TABLE processes');
        $this->addSql('DROP TABLE process_process_message_stack');
        $this->addSql('DROP TABLE pois');
        $this->addSql('DROP TABLE scenarios');
        $this->addSql('DROP TABLE steps');
        $this->addSql('DROP TABLE info_steps');
        $this->addSql('DROP TABLE place_steps');
        $this->addSql('DROP TABLE task_steps');
        $this->addSql('DROP TABLE quests');
        $this->addSql('DROP TABLE tasks');
        $this->addSql('DROP TABLE tasks_semantical_message_stacks');
        $this->addSql('DROP TABLE fun_tasks');
        $this->addSql('DROP TABLE question_tasks');
    }
}
