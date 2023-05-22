<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522094153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parfum DROP FOREIGN KEY FK_F295BD4CFB88E14F');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(100) NOT NULL, pseudo VARCHAR(100) NOT NULL, age INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_parfum (user_id INT NOT NULL, parfum_id INT NOT NULL, INDEX IDX_97C7A671A76ED395 (user_id), INDEX IDX_97C7A671CECF0658 (parfum_id), PRIMARY KEY(user_id, parfum_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_parfum ADD CONSTRAINT FK_97C7A671A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_parfum ADD CONSTRAINT FK_97C7A671CECF0658 FOREIGN KEY (parfum_id) REFERENCES parfum (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_parfum DROP FOREIGN KEY FK_933887C7CECF0658');
        $this->addSql('ALTER TABLE utilisateur_parfum DROP FOREIGN KEY FK_933887C7FB88E14F');
        $this->addSql('DROP TABLE utilisateur_parfum');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP INDEX IDX_F295BD4CFB88E14F ON parfum');
        $this->addSql('ALTER TABLE parfum CHANGE utilisateur_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parfum ADD CONSTRAINT FK_F295BD4CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F295BD4CA76ED395 ON parfum (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parfum DROP FOREIGN KEY FK_F295BD4CA76ED395');
        $this->addSql('CREATE TABLE utilisateur_parfum (utilisateur_id INT NOT NULL, parfum_id INT NOT NULL, INDEX IDX_933887C7FB88E14F (utilisateur_id), INDEX IDX_933887C7CECF0658 (parfum_id), PRIMARY KEY(utilisateur_id, parfum_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, surnom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, age INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE utilisateur_parfum ADD CONSTRAINT FK_933887C7CECF0658 FOREIGN KEY (parfum_id) REFERENCES parfum (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_parfum ADD CONSTRAINT FK_933887C7FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_parfum DROP FOREIGN KEY FK_97C7A671A76ED395');
        $this->addSql('ALTER TABLE user_parfum DROP FOREIGN KEY FK_97C7A671CECF0658');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_parfum');
        $this->addSql('DROP INDEX IDX_F295BD4CA76ED395 ON parfum');
        $this->addSql('ALTER TABLE parfum CHANGE user_id utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parfum ADD CONSTRAINT FK_F295BD4CFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F295BD4CFB88E14F ON parfum (utilisateur_id)');
    }
}
