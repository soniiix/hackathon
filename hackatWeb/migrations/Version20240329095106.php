<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240329095106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favori DROP FOREIGN KEY FK_EF85A2CC1424BA40');
        $this->addSql('ALTER TABLE favori DROP FOREIGN KEY FK_EF85A2CCFABCF002');
        $this->addSql('DROP INDEX IDX_EF85A2CCFABCF002 ON favori');
        $this->addSql('DROP INDEX IDX_EF85A2CC1424BA40 ON favori');
        $this->addSql('ALTER TABLE favori ADD idParticipant INT NOT NULL, ADD idHackathon INT NOT NULL, DROP le_participant_id, DROP le_hackathon_id');
        $this->addSql('ALTER TABLE favori ADD CONSTRAINT FK_EF85A2CC97C29469 FOREIGN KEY (idParticipant) REFERENCES participant (id)');
        $this->addSql('ALTER TABLE favori ADD CONSTRAINT FK_EF85A2CC77D0DD19 FOREIGN KEY (idHackathon) REFERENCES hackathon (id)');
        $this->addSql('CREATE INDEX IDX_EF85A2CC97C29469 ON favori (idParticipant)');
        $this->addSql('CREATE INDEX IDX_EF85A2CC77D0DD19 ON favori (idHackathon)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favori DROP FOREIGN KEY FK_EF85A2CC97C29469');
        $this->addSql('ALTER TABLE favori DROP FOREIGN KEY FK_EF85A2CC77D0DD19');
        $this->addSql('DROP INDEX IDX_EF85A2CC97C29469 ON favori');
        $this->addSql('DROP INDEX IDX_EF85A2CC77D0DD19 ON favori');
        $this->addSql('ALTER TABLE favori ADD le_participant_id INT NOT NULL, ADD le_hackathon_id INT NOT NULL, DROP idParticipant, DROP idHackathon');
        $this->addSql('ALTER TABLE favori ADD CONSTRAINT FK_EF85A2CC1424BA40 FOREIGN KEY (le_hackathon_id) REFERENCES hackathon (id)');
        $this->addSql('ALTER TABLE favori ADD CONSTRAINT FK_EF85A2CCFABCF002 FOREIGN KEY (le_participant_id) REFERENCES participant (id)');
        $this->addSql('CREATE INDEX IDX_EF85A2CCFABCF002 ON favori (le_participant_id)');
        $this->addSql('CREATE INDEX IDX_EF85A2CC1424BA40 ON favori (le_hackathon_id)');
    }
}
