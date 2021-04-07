<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407090459 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE absence (id INT AUTO_INCREMENT NOT NULL, member_id INT NOT NULL, course_name_id INT NOT NULL, date DATE NOT NULL, motif VARCHAR(100) DEFAULT NULL, INDEX IDX_765AE0C97597D3FE (member_id), INDEX IDX_765AE0C979D4993A (course_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE child (id INT NOT NULL, cours_id INT DEFAULT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, date_naissance DATE DEFAULT NULL, numero_parent VARCHAR(20) DEFAULT NULL, statut VARCHAR(30) DEFAULT NULL, paiement VARCHAR(30) NOT NULL, date_paiement DATE DEFAULT NULL, INDEX IDX_22B354297ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, date VARCHAR(60) NOT NULL, niveau VARCHAR(50) NOT NULL, public VARCHAR(40) NOT NULL, max_member INT NOT NULL, heure VARCHAR(10) NOT NULL, fin VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(50) NOT NULL, content LONGTEXT NOT NULL, publication_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, userType VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C97597D3FE FOREIGN KEY (member_id) REFERENCES child (id)');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C979D4993A FOREIGN KEY (course_name_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B354297ECF78B0 FOREIGN KEY (cours_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B35429BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C97597D3FE');
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C979D4993A');
        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B354297ECF78B0');
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B35429BF396750');
        $this->addSql('DROP TABLE absence');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE child');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE `user`');
    }
}
