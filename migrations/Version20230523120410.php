<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230523120410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notes (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE note_de_coeur ADD notes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note_de_coeur ADD CONSTRAINT FK_1A060A76FC56F556 FOREIGN KEY (notes_id) REFERENCES notes (id)');
        $this->addSql('CREATE INDEX IDX_1A060A76FC56F556 ON note_de_coeur (notes_id)');
        $this->addSql('ALTER TABLE note_de_fond ADD notes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note_de_fond ADD CONSTRAINT FK_6D2E724BFC56F556 FOREIGN KEY (notes_id) REFERENCES notes (id)');
        $this->addSql('CREATE INDEX IDX_6D2E724BFC56F556 ON note_de_fond (notes_id)');
        $this->addSql('ALTER TABLE note_de_tete ADD notes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note_de_tete ADD CONSTRAINT FK_5D83A2C4FC56F556 FOREIGN KEY (notes_id) REFERENCES notes (id)');
        $this->addSql('CREATE INDEX IDX_5D83A2C4FC56F556 ON note_de_tete (notes_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note_de_coeur DROP FOREIGN KEY FK_1A060A76FC56F556');
        $this->addSql('ALTER TABLE note_de_fond DROP FOREIGN KEY FK_6D2E724BFC56F556');
        $this->addSql('ALTER TABLE note_de_tete DROP FOREIGN KEY FK_5D83A2C4FC56F556');
        $this->addSql('DROP TABLE notes');
        $this->addSql('DROP INDEX IDX_6D2E724BFC56F556 ON note_de_fond');
        $this->addSql('ALTER TABLE note_de_fond DROP notes_id');
        $this->addSql('DROP INDEX IDX_1A060A76FC56F556 ON note_de_coeur');
        $this->addSql('ALTER TABLE note_de_coeur DROP notes_id');
        $this->addSql('DROP INDEX IDX_5D83A2C4FC56F556 ON note_de_tete');
        $this->addSql('ALTER TABLE note_de_tete DROP notes_id');
    }
}
