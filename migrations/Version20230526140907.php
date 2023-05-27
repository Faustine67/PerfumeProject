<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230526140907 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_post_like (parfum_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_65D6AA5CCECF0658 (parfum_id), INDEX IDX_65D6AA5CA76ED395 (user_id), PRIMARY KEY(parfum_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_parfum (user_id INT NOT NULL, parfum_id INT NOT NULL, INDEX IDX_97C7A671A76ED395 (user_id), INDEX IDX_97C7A671CECF0658 (parfum_id), PRIMARY KEY(user_id, parfum_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_post_like ADD CONSTRAINT FK_65D6AA5CCECF0658 FOREIGN KEY (parfum_id) REFERENCES parfum (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_post_like ADD CONSTRAINT FK_65D6AA5CA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_parfum ADD CONSTRAINT FK_97C7A671A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_parfum ADD CONSTRAINT FK_97C7A671CECF0658 FOREIGN KEY (parfum_id) REFERENCES parfum (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parfum DROP FOREIGN KEY FK_F295BD4CA76ED395');
        $this->addSql('DROP INDEX IDX_F295BD4CA76ED395 ON parfum');
        $this->addSql('ALTER TABLE parfum DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_post_like DROP FOREIGN KEY FK_65D6AA5CCECF0658');
        $this->addSql('ALTER TABLE user_post_like DROP FOREIGN KEY FK_65D6AA5CA76ED395');
        $this->addSql('ALTER TABLE user_parfum DROP FOREIGN KEY FK_97C7A671A76ED395');
        $this->addSql('ALTER TABLE user_parfum DROP FOREIGN KEY FK_97C7A671CECF0658');
        $this->addSql('DROP TABLE user_post_like');
        $this->addSql('DROP TABLE user_parfum');
        $this->addSql('ALTER TABLE parfum ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parfum ADD CONSTRAINT FK_F295BD4CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F295BD4CA76ED395 ON parfum (user_id)');
    }
}
