<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210311113118 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE child_course');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE child_course (child_id INT NOT NULL, course_id INT NOT NULL, INDEX IDX_7FCBABE5DD62C21B (child_id), INDEX IDX_7FCBABE5591CC992 (course_id), PRIMARY KEY(child_id, course_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE child_course ADD CONSTRAINT FK_7FCBABE5591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE child_course ADD CONSTRAINT FK_7FCBABE5DD62C21B FOREIGN KEY (child_id) REFERENCES child (id) ON DELETE CASCADE');
    }
}
