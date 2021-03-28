<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210311112617 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE child (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, date_naissance DATE DEFAULT NULL, numero_parent VARCHAR(20) DEFAULT NULL, email VARCHAR(40) NOT NULL, statut VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE child_course (child_id INT NOT NULL, course_id INT NOT NULL, INDEX IDX_7FCBABE5DD62C21B (child_id), INDEX IDX_7FCBABE5591CC992 (course_id), PRIMARY KEY(child_id, course_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, date VARCHAR(60) NOT NULL, niveau VARCHAR(50) NOT NULL, public VARCHAR(40) NOT NULL, max_member INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(50) NOT NULL, content LONGTEXT NOT NULL, publication_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE child_course ADD CONSTRAINT FK_7FCBABE5DD62C21B FOREIGN KEY (child_id) REFERENCES child (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE child_course ADD CONSTRAINT FK_7FCBABE5591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE child_course DROP FOREIGN KEY FK_7FCBABE5DD62C21B');
        $this->addSql('ALTER TABLE child_course DROP FOREIGN KEY FK_7FCBABE5591CC992');
        $this->addSql('DROP TABLE child');
        $this->addSql('DROP TABLE child_course');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE news');
    }
}
