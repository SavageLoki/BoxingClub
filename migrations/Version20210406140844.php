<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406140844 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE absence (id INT AUTO_INCREMENT NOT NULL, member_id INT NOT NULL, course_name_id INT NOT NULL, date DATE NOT NULL, motif VARCHAR(100) DEFAULT NULL, INDEX IDX_765AE0C97597D3FE (member_id), INDEX IDX_765AE0C979D4993A (course_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C97597D3FE FOREIGN KEY (member_id) REFERENCES child (id)');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C979D4993A FOREIGN KEY (course_name_id) REFERENCES course (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE absence');
    }
}
