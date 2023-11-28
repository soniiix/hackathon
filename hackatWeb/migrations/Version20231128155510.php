<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231128155510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(128) NOT NULL, date DATE NOT NULL, heure TIME NOT NULL, duree VARCHAR(32) NOT NULL, salle VARCHAR(32) NOT NULL, type VARCHAR(255) NOT NULL, nbParticipants INT DEFAULT NULL, theme VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hackathon (id INT AUTO_INCREMENT NOT NULL, nbPlacesMax INT NOT NULL, dateLimiteInscription DATETIME NOT NULL, titre VARCHAR(128) NOT NULL, ville VARCHAR(128) NOT NULL, codePostal INT NOT NULL, rue VARCHAR(128) NOT NULL, dateDebut DATE NOT NULL, dateFin DATE NOT NULL, heureDebut TIME NOT NULL, heureFin TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hackathon_evenement (hackathon_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_52FBDE83996D90CF (hackathon_id), INDEX IDX_52FBDE83FD02F13 (evenement_id), PRIMARY KEY(hackathon_id, evenement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_atelier (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_hackathon (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, idParticipant INT NOT NULL, idHackathon INT NOT NULL, INDEX IDX_2D2F345797C29469 (idParticipant), INDEX IDX_2D2F345777D0DD19 (idHackathon), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervenant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(128) NOT NULL, prenom VARCHAR(128) NOT NULL, mail VARCHAR(128) NOT NULL, tel INT NOT NULL, dateNaissance DATE NOT NULL, lienPortfolio VARCHAR(128) NOT NULL, mdp VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hackathon_evenement ADD CONSTRAINT FK_52FBDE83996D90CF FOREIGN KEY (hackathon_id) REFERENCES hackathon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hackathon_evenement ADD CONSTRAINT FK_52FBDE83FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription_hackathon ADD CONSTRAINT FK_2D2F345797C29469 FOREIGN KEY (idParticipant) REFERENCES participant (id)');
        $this->addSql('ALTER TABLE inscription_hackathon ADD CONSTRAINT FK_2D2F345777D0DD19 FOREIGN KEY (idHackathon) REFERENCES hackathon (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hackathon_evenement DROP FOREIGN KEY FK_52FBDE83996D90CF');
        $this->addSql('ALTER TABLE hackathon_evenement DROP FOREIGN KEY FK_52FBDE83FD02F13');
        $this->addSql('ALTER TABLE inscription_hackathon DROP FOREIGN KEY FK_2D2F345797C29469');
        $this->addSql('ALTER TABLE inscription_hackathon DROP FOREIGN KEY FK_2D2F345777D0DD19');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE hackathon');
        $this->addSql('DROP TABLE hackathon_evenement');
        $this->addSql('DROP TABLE inscription_atelier');
        $this->addSql('DROP TABLE inscription_hackathon');
        $this->addSql('DROP TABLE intervenant');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
