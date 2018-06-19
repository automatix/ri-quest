<?php declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180619161326 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE content_blocks ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE audio_content_blocks DROP FOREIGN KEY FK_E718E1DEBF396750');
        $this->addSql('ALTER TABLE audio_content_blocks ADD CONSTRAINT FK_E718E1DEBF396750 FOREIGN KEY (id) REFERENCES content_blocks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tasks ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE fun_tasks DROP FOREIGN KEY FK_9DEB6C64BF396750');
        $this->addSql('ALTER TABLE fun_tasks ADD CONSTRAINT FK_9DEB6C64BF396750 FOREIGN KEY (id) REFERENCES tasks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_content_blocks DROP FOREIGN KEY FK_314D32BEBF396750');
        $this->addSql('ALTER TABLE image_content_blocks ADD CONSTRAINT FK_314D32BEBF396750 FOREIGN KEY (id) REFERENCES content_blocks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE processes ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE info_steps DROP FOREIGN KEY FK_3E7BCF87BF396750');
        $this->addSql('ALTER TABLE info_steps ADD CONSTRAINT FK_3E7BCF87BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE link_content_blocks DROP FOREIGN KEY FK_B2AF2197BF396750');
        $this->addSql('ALTER TABLE link_content_blocks ADD CONSTRAINT FK_B2AF2197BF396750 FOREIGN KEY (id) REFERENCES content_blocks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_stacks CHANGE type type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE place_steps DROP FOREIGN KEY FK_9D541151BF396750');
        $this->addSql('ALTER TABLE place_steps ADD CONSTRAINT FK_9D541151BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pois DROP FOREIGN KEY FK_74C303F5BF396750');
        $this->addSql('ALTER TABLE pois ADD CONSTRAINT FK_74C303F5BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE process_message_stacks DROP FOREIGN KEY FK_5C53BA4EBF396750');
        $this->addSql('ALTER TABLE process_message_stacks ADD CONSTRAINT FK_5C53BA4EBF396750 FOREIGN KEY (id) REFERENCES message_stacks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question_tasks DROP FOREIGN KEY FK_60B37493BF396750');
        $this->addSql('ALTER TABLE question_tasks ADD CONSTRAINT FK_60B37493BF396750 FOREIGN KEY (id) REFERENCES tasks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenarios DROP FOREIGN KEY FK_9338D025BF396750');
        $this->addSql('ALTER TABLE scenarios ADD CONSTRAINT FK_9338D025BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semantical_message_stacks DROP FOREIGN KEY FK_1F915555BF396750');
        $this->addSql('ALTER TABLE semantical_message_stacks ADD CONSTRAINT FK_1F915555BF396750 FOREIGN KEY (id) REFERENCES message_stacks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task_steps DROP FOREIGN KEY FK_F3861152BF396750');
        $this->addSql('ALTER TABLE task_steps ADD CONSTRAINT FK_F3861152BF396750 FOREIGN KEY (id) REFERENCES processes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE text_content_blocks DROP FOREIGN KEY FK_6C1D09C3BF396750');
        $this->addSql('ALTER TABLE text_content_blocks ADD CONSTRAINT FK_6C1D09C3BF396750 FOREIGN KEY (id) REFERENCES content_blocks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video_content_blocks DROP FOREIGN KEY FK_8009AF54BF396750');
        $this->addSql('ALTER TABLE video_content_blocks ADD CONSTRAINT FK_8009AF54BF396750 FOREIGN KEY (id) REFERENCES content_blocks (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE audio_content_blocks DROP FOREIGN KEY FK_E718E1DEBF396750');
        $this->addSql('ALTER TABLE audio_content_blocks ADD CONSTRAINT FK_E718E1DEBF396750 FOREIGN KEY (id) REFERENCES content_blocks (id)');
        $this->addSql('ALTER TABLE content_blocks DROP type');
        $this->addSql('ALTER TABLE fun_tasks DROP FOREIGN KEY FK_9DEB6C64BF396750');
        $this->addSql('ALTER TABLE fun_tasks ADD CONSTRAINT FK_9DEB6C64BF396750 FOREIGN KEY (id) REFERENCES tasks (id)');
        $this->addSql('ALTER TABLE image_content_blocks DROP FOREIGN KEY FK_314D32BEBF396750');
        $this->addSql('ALTER TABLE image_content_blocks ADD CONSTRAINT FK_314D32BEBF396750 FOREIGN KEY (id) REFERENCES content_blocks (id)');
        $this->addSql('ALTER TABLE info_steps DROP FOREIGN KEY FK_3E7BCF87BF396750');
        $this->addSql('ALTER TABLE info_steps ADD CONSTRAINT FK_3E7BCF87BF396750 FOREIGN KEY (id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE link_content_blocks DROP FOREIGN KEY FK_B2AF2197BF396750');
        $this->addSql('ALTER TABLE link_content_blocks ADD CONSTRAINT FK_B2AF2197BF396750 FOREIGN KEY (id) REFERENCES content_blocks (id)');
        $this->addSql('ALTER TABLE message_stacks CHANGE type type VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE place_steps DROP FOREIGN KEY FK_9D541151BF396750');
        $this->addSql('ALTER TABLE place_steps ADD CONSTRAINT FK_9D541151BF396750 FOREIGN KEY (id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE pois DROP FOREIGN KEY FK_74C303F5BF396750');
        $this->addSql('ALTER TABLE pois ADD CONSTRAINT FK_74C303F5BF396750 FOREIGN KEY (id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE process_message_stacks DROP FOREIGN KEY FK_5C53BA4EBF396750');
        $this->addSql('ALTER TABLE process_message_stacks ADD CONSTRAINT FK_5C53BA4EBF396750 FOREIGN KEY (id) REFERENCES message_stacks (id)');
        $this->addSql('ALTER TABLE processes DROP type');
        $this->addSql('ALTER TABLE question_tasks DROP FOREIGN KEY FK_60B37493BF396750');
        $this->addSql('ALTER TABLE question_tasks ADD CONSTRAINT FK_60B37493BF396750 FOREIGN KEY (id) REFERENCES tasks (id)');
        $this->addSql('ALTER TABLE scenarios DROP FOREIGN KEY FK_9338D025BF396750');
        $this->addSql('ALTER TABLE scenarios ADD CONSTRAINT FK_9338D025BF396750 FOREIGN KEY (id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE semantical_message_stacks DROP FOREIGN KEY FK_1F915555BF396750');
        $this->addSql('ALTER TABLE semantical_message_stacks ADD CONSTRAINT FK_1F915555BF396750 FOREIGN KEY (id) REFERENCES message_stacks (id)');
        $this->addSql('ALTER TABLE task_steps DROP FOREIGN KEY FK_F3861152BF396750');
        $this->addSql('ALTER TABLE task_steps ADD CONSTRAINT FK_F3861152BF396750 FOREIGN KEY (id) REFERENCES processes (id)');
        $this->addSql('ALTER TABLE tasks DROP type');
        $this->addSql('ALTER TABLE text_content_blocks DROP FOREIGN KEY FK_6C1D09C3BF396750');
        $this->addSql('ALTER TABLE text_content_blocks ADD CONSTRAINT FK_6C1D09C3BF396750 FOREIGN KEY (id) REFERENCES content_blocks (id)');
        $this->addSql('ALTER TABLE video_content_blocks DROP FOREIGN KEY FK_8009AF54BF396750');
        $this->addSql('ALTER TABLE video_content_blocks ADD CONSTRAINT FK_8009AF54BF396750 FOREIGN KEY (id) REFERENCES content_blocks (id)');
    }
}
