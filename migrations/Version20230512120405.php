<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512120405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note_de_coeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note_de_fond (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note_de_fond_parfum (note_de_fond_id INT NOT NULL, parfum_id INT NOT NULL, INDEX IDX_BCFD693DDB51B1C7 (note_de_fond_id), INDEX IDX_BCFD693DCECF0658 (parfum_id), PRIMARY KEY(note_de_fond_id, parfum_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note_de_tete (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parfum (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prix INT DEFAULT NULL, avis LONGTEXT DEFAULT NULL, note INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_F295BD4C4827B9B2 (marque_id), INDEX IDX_F295BD4CFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parfum_parfum (parfum_source INT NOT NULL, parfum_target INT NOT NULL, INDEX IDX_1BD03325B6CFF11A (parfum_source), INDEX IDX_1BD03325AF2AA195 (parfum_target), PRIMARY KEY(parfum_source, parfum_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parfum_note_de_tete (parfum_id INT NOT NULL, note_de_tete_id INT NOT NULL, INDEX IDX_7657B185CECF0658 (parfum_id), INDEX IDX_7657B1851867F700 (note_de_tete_id), PRIMARY KEY(parfum_id, note_de_tete_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parfum_note_de_coeur (parfum_id INT NOT NULL, note_de_coeur_id INT NOT NULL, INDEX IDX_1BF6AF63CECF0658 (parfum_id), INDEX IDX_1BF6AF6325B19C77 (note_de_coeur_id), PRIMARY KEY(parfum_id, note_de_coeur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parfum_notede_fond (parfum_id INT NOT NULL, notede_fond_id INT NOT NULL, INDEX IDX_6D20D53CCECF0658 (parfum_id), INDEX IDX_6D20D53CE1CDDC75 (notede_fond_id), PRIMARY KEY(parfum_id, notede_fond_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(100) NOT NULL, nom VARCHAR(255) NOT NULL, surnom VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, age INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur_parfum (utilisateur_id INT NOT NULL, parfum_id INT NOT NULL, INDEX IDX_933887C7FB88E14F (utilisateur_id), INDEX IDX_933887C7CECF0658 (parfum_id), PRIMARY KEY(utilisateur_id, parfum_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE note_de_fond_parfum ADD CONSTRAINT FK_BCFD693DDB51B1C7 FOREIGN KEY (note_de_fond_id) REFERENCES note_de_fond (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note_de_fond_parfum ADD CONSTRAINT FK_BCFD693DCECF0658 FOREIGN KEY (parfum_id) REFERENCES parfum (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parfum ADD CONSTRAINT FK_F295BD4C4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE parfum ADD CONSTRAINT FK_F295BD4CFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE parfum_parfum ADD CONSTRAINT FK_1BD03325B6CFF11A FOREIGN KEY (parfum_source) REFERENCES parfum (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parfum_parfum ADD CONSTRAINT FK_1BD03325AF2AA195 FOREIGN KEY (parfum_target) REFERENCES parfum (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parfum_note_de_tete ADD CONSTRAINT FK_7657B185CECF0658 FOREIGN KEY (parfum_id) REFERENCES parfum (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parfum_note_de_tete ADD CONSTRAINT FK_7657B1851867F700 FOREIGN KEY (note_de_tete_id) REFERENCES note_de_tete (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parfum_note_de_coeur ADD CONSTRAINT FK_1BF6AF63CECF0658 FOREIGN KEY (parfum_id) REFERENCES parfum (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parfum_note_de_coeur ADD CONSTRAINT FK_1BF6AF6325B19C77 FOREIGN KEY (note_de_coeur_id) REFERENCES note_de_coeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parfum_notede_fond ADD CONSTRAINT FK_6D20D53CCECF0658 FOREIGN KEY (parfum_id) REFERENCES parfum (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parfum_notede_fond ADD CONSTRAINT FK_6D20D53CE1CDDC75 FOREIGN KEY (notede_fond_id) REFERENCES note_de_fond (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_parfum ADD CONSTRAINT FK_933887C7FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_parfum ADD CONSTRAINT FK_933887C7CECF0658 FOREIGN KEY (parfum_id) REFERENCES parfum (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note_de_fond_parfum DROP FOREIGN KEY FK_BCFD693DDB51B1C7');
        $this->addSql('ALTER TABLE note_de_fond_parfum DROP FOREIGN KEY FK_BCFD693DCECF0658');
        $this->addSql('ALTER TABLE parfum DROP FOREIGN KEY FK_F295BD4C4827B9B2');
        $this->addSql('ALTER TABLE parfum DROP FOREIGN KEY FK_F295BD4CFB88E14F');
        $this->addSql('ALTER TABLE parfum_parfum DROP FOREIGN KEY FK_1BD03325B6CFF11A');
        $this->addSql('ALTER TABLE parfum_parfum DROP FOREIGN KEY FK_1BD03325AF2AA195');
        $this->addSql('ALTER TABLE parfum_note_de_tete DROP FOREIGN KEY FK_7657B185CECF0658');
        $this->addSql('ALTER TABLE parfum_note_de_tete DROP FOREIGN KEY FK_7657B1851867F700');
        $this->addSql('ALTER TABLE parfum_note_de_coeur DROP FOREIGN KEY FK_1BF6AF63CECF0658');
        $this->addSql('ALTER TABLE parfum_note_de_coeur DROP FOREIGN KEY FK_1BF6AF6325B19C77');
        $this->addSql('ALTER TABLE parfum_notede_fond DROP FOREIGN KEY FK_6D20D53CCECF0658');
        $this->addSql('ALTER TABLE parfum_notede_fond DROP FOREIGN KEY FK_6D20D53CE1CDDC75');
        $this->addSql('ALTER TABLE utilisateur_parfum DROP FOREIGN KEY FK_933887C7FB88E14F');
        $this->addSql('ALTER TABLE utilisateur_parfum DROP FOREIGN KEY FK_933887C7CECF0658');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE note_de_coeur');
        $this->addSql('DROP TABLE note_de_fond');
        $this->addSql('DROP TABLE note_de_fond_parfum');
        $this->addSql('DROP TABLE note_de_tete');
        $this->addSql('DROP TABLE parfum');
        $this->addSql('DROP TABLE parfum_parfum');
        $this->addSql('DROP TABLE parfum_note_de_tete');
        $this->addSql('DROP TABLE parfum_note_de_coeur');
        $this->addSql('DROP TABLE parfum_notede_fond');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utilisateur_parfum');
    }
}
