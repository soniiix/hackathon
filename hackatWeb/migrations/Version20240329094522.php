<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240329094522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favori (id INT AUTO_INCREMENT NOT NULL, le_participant_id INT NOT NULL, le_hackathon_id INT NOT NULL, INDEX IDX_EF85A2CCFABCF002 (le_participant_id), INDEX IDX_EF85A2CC1424BA40 (le_hackathon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favori ADD CONSTRAINT FK_EF85A2CCFABCF002 FOREIGN KEY (le_participant_id) REFERENCES participant (id)');
        $this->addSql('ALTER TABLE favori ADD CONSTRAINT FK_EF85A2CC1424BA40 FOREIGN KEY (le_hackathon_id) REFERENCES hackathon (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D79F6B115126AC48 ON participant (mail)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favori DROP FOREIGN KEY FK_EF85A2CCFABCF002');
        $this->addSql('ALTER TABLE favori DROP FOREIGN KEY FK_EF85A2CC1424BA40');
        $this->addSql('DROP TABLE favori');
        $this->addSql('DROP INDEX UNIQ_D79F6B115126AC48 ON participant');
    }
}
