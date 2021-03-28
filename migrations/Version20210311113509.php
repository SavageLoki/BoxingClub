<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210311113509 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE child ADD cours_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B354297ECF78B0 FOREIGN KEY (cours_id) REFERENCES course (id)');
        $this->addSql('CREATE INDEX IDX_22B354297ECF78B0 ON child (cours_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B354297ECF78B0');
        $this->addSql('DROP INDEX IDX_22B354297ECF78B0 ON child');
        $this->addSql('ALTER TABLE child DROP cours_id');
    }
}
