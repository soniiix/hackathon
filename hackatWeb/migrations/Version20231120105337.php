<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231120105337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription_hackathon ADD idParticipant INT NOT NULL, ADD idHackathon INT NOT NULL');
        $this->addSql('ALTER TABLE inscription_hackathon ADD CONSTRAINT FK_2D2F345797C29469 FOREIGN KEY (idParticipant) REFERENCES participant (id)');
        $this->addSql('ALTER TABLE inscription_hackathon ADD CONSTRAINT FK_2D2F345777D0DD19 FOREIGN KEY (idHackathon) REFERENCES hackathon (id)');
        $this->addSql('CREATE INDEX IDX_2D2F345797C29469 ON inscription_hackathon (idParticipant)');
        $this->addSql('CREATE INDEX IDX_2D2F345777D0DD19 ON inscription_hackathon (idHackathon)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription_hackathon DROP FOREIGN KEY FK_2D2F345797C29469');
        $this->addSql('ALTER TABLE inscription_hackathon DROP FOREIGN KEY FK_2D2F345777D0DD19');
        $this->addSql('DROP INDEX IDX_2D2F345797C29469 ON inscription_hackathon');
        $this->addSql('DROP INDEX IDX_2D2F345777D0DD19 ON inscription_hackathon');
        $this->addSql('ALTER TABLE inscription_hackathon DROP idParticipant, DROP idHackathon');
    }
}
