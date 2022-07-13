<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220616071554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actors (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documentaires (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, release_date DATE NOT NULL, version VARCHAR(255) NOT NULL, director VARCHAR(255) NOT NULL, synopsis VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documentaires_genre (documentaires_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_36D37D7D40D8767C (documentaires_id), INDEX IDX_36D37D7D4296D31F (genre_id), PRIMARY KEY(documentaires_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE films (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, release_date DATE NOT NULL, version VARCHAR(255) NOT NULL, director VARCHAR(255) NOT NULL, duration INT NOT NULL, synopsis LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE films_actors (films_id INT NOT NULL, actors_id INT NOT NULL, INDEX IDX_687F7B5C939610EE (films_id), INDEX IDX_687F7B5C7168CF59 (actors_id), PRIMARY KEY(films_id, actors_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre_films (genre_id INT NOT NULL, films_id INT NOT NULL, INDEX IDX_73EAD5944296D31F (genre_id), INDEX IDX_73EAD594939610EE (films_id), PRIMARY KEY(genre_id, films_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre_series (genre_id INT NOT NULL, series_id INT NOT NULL, INDEX IDX_D1A3310D4296D31F (genre_id), INDEX IDX_D1A3310D5278319C (series_id), PRIMARY KEY(genre_id, series_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE series (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, release_date DATE NOT NULL, version VARCHAR(255) NOT NULL, director VARCHAR(255) NOT NULL, synopsis VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE series_actors (series_id INT NOT NULL, actors_id INT NOT NULL, INDEX IDX_BC5813D85278319C (series_id), INDEX IDX_BC5813D87168CF59 (actors_id), PRIMARY KEY(series_id, actors_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE documentaires_genre ADD CONSTRAINT FK_36D37D7D40D8767C FOREIGN KEY (documentaires_id) REFERENCES documentaires (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE documentaires_genre ADD CONSTRAINT FK_36D37D7D4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films_actors ADD CONSTRAINT FK_687F7B5C939610EE FOREIGN KEY (films_id) REFERENCES films (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films_actors ADD CONSTRAINT FK_687F7B5C7168CF59 FOREIGN KEY (actors_id) REFERENCES actors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre_films ADD CONSTRAINT FK_73EAD5944296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre_films ADD CONSTRAINT FK_73EAD594939610EE FOREIGN KEY (films_id) REFERENCES films (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre_series ADD CONSTRAINT FK_D1A3310D4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre_series ADD CONSTRAINT FK_D1A3310D5278319C FOREIGN KEY (series_id) REFERENCES series (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE series_actors ADD CONSTRAINT FK_BC5813D85278319C FOREIGN KEY (series_id) REFERENCES series (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE series_actors ADD CONSTRAINT FK_BC5813D87168CF59 FOREIGN KEY (actors_id) REFERENCES actors (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE films_actors DROP FOREIGN KEY FK_687F7B5C7168CF59');
        $this->addSql('ALTER TABLE series_actors DROP FOREIGN KEY FK_BC5813D87168CF59');
        $this->addSql('ALTER TABLE documentaires_genre DROP FOREIGN KEY FK_36D37D7D40D8767C');
        $this->addSql('ALTER TABLE films_actors DROP FOREIGN KEY FK_687F7B5C939610EE');
        $this->addSql('ALTER TABLE genre_films DROP FOREIGN KEY FK_73EAD594939610EE');
        $this->addSql('ALTER TABLE documentaires_genre DROP FOREIGN KEY FK_36D37D7D4296D31F');
        $this->addSql('ALTER TABLE genre_films DROP FOREIGN KEY FK_73EAD5944296D31F');
        $this->addSql('ALTER TABLE genre_series DROP FOREIGN KEY FK_D1A3310D4296D31F');
        $this->addSql('ALTER TABLE genre_series DROP FOREIGN KEY FK_D1A3310D5278319C');
        $this->addSql('ALTER TABLE series_actors DROP FOREIGN KEY FK_BC5813D85278319C');
        $this->addSql('DROP TABLE actors');
        $this->addSql('DROP TABLE documentaires');
        $this->addSql('DROP TABLE documentaires_genre');
        $this->addSql('DROP TABLE films');
        $this->addSql('DROP TABLE films_actors');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE genre_films');
        $this->addSql('DROP TABLE genre_series');
        $this->addSql('DROP TABLE series');
        $this->addSql('DROP TABLE series_actors');
        $this->addSql('DROP TABLE user');
    }
}
