<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522142442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parfum DROP FOREIGN KEY FK_F295BD4CFB88E14F');
        $this->addSql('DROP INDEX IDX_F295BD4CFB88E14F ON parfum');
        $this->addSql('ALTER TABLE parfum CHANGE utilisateur_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parfum ADD CONSTRAINT FK_F295BD4CA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_F295BD4CA76ED395 ON parfum (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parfum DROP FOREIGN KEY FK_F295BD4CA76ED395');
        $this->addSql('DROP INDEX IDX_F295BD4CA76ED395 ON parfum');
        $this->addSql('ALTER TABLE parfum CHANGE user_id utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parfum ADD CONSTRAINT FK_F295BD4CFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F295BD4CFB88E14F ON parfum (utilisateur_id)');
    }
}
