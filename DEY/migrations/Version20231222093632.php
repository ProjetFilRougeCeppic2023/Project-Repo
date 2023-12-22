<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231222093632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movie_tag (movie_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_DCD9F2918F93B6FC (movie_id), INDEX IDX_DCD9F291BAD26311 (tag_id), PRIMARY KEY(movie_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie_tag ADD CONSTRAINT FK_DCD9F2918F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_tag ADD CONSTRAINT FK_DCD9F291BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26FBAD26311');
        $this->addSql('DROP INDEX IDX_1D5EF26FBAD26311 ON movie');
        $this->addSql('ALTER TABLE movie DROP tag_id');
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B7838F93B6FC');
        $this->addSql('DROP INDEX IDX_389B7838F93B6FC ON tag');
        $this->addSql('ALTER TABLE tag DROP movie_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie_tag DROP FOREIGN KEY FK_DCD9F2918F93B6FC');
        $this->addSql('ALTER TABLE movie_tag DROP FOREIGN KEY FK_DCD9F291BAD26311');
        $this->addSql('DROP TABLE movie_tag');
        $this->addSql('ALTER TABLE tag ADD movie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B7838F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('CREATE INDEX IDX_389B7838F93B6FC ON tag (movie_id)');
        $this->addSql('ALTER TABLE movie ADD tag_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26FBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id)');
        $this->addSql('CREATE INDEX IDX_1D5EF26FBAD26311 ON movie (tag_id)');
    }
}
