<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220604153602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE documentaires (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, release_date DATE NOT NULL, version VARCHAR(255) NOT NULL, director VARCHAR(255) NOT NULL, synopsis VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documentaires_genre (documentaires_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_36D37D7D40D8767C (documentaires_id), INDEX IDX_36D37D7D4296D31F (genre_id), PRIMARY KEY(documentaires_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE documentaires_genre ADD CONSTRAINT FK_36D37D7D40D8767C FOREIGN KEY (documentaires_id) REFERENCES documentaires (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE documentaires_genre ADD CONSTRAINT FK_36D37D7D4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE series ADD slug VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE documentaires_genre DROP FOREIGN KEY FK_36D37D7D40D8767C');
        $this->addSql('DROP TABLE documentaires');
        $this->addSql('DROP TABLE documentaires_genre');
        $this->addSql('ALTER TABLE films DROP slug');
        $this->addSql('ALTER TABLE series DROP slug');
    }
}
