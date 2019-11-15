<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191024134813 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE akapit (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, tytul_id INT DEFAULT NULL, tresc LONGTEXT DEFAULT NULL, odstepg DOUBLE PRECISION NOT NULL, odstepp DOUBLE PRECISION NOT NULL, odstepd DOUBLE PRECISION NOT NULL, odstepl DOUBLE PRECISION NOT NULL, czcionka VARCHAR(255) NOT NULL, rozmiar DOUBLE PRECISION NOT NULL, kolor VARCHAR(255) NOT NULL, pochylenie SMALLINT NOT NULL, pogrubienie SMALLINT NOT NULL, INDEX IDX_A8B4A6FD4B89032C (post_id), UNIQUE INDEX UNIQ_A8B4A6FD7DB9A10A (tytul_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tytul (id INT AUTO_INCREMENT NOT NULL, tresc VARCHAR(255) DEFAULT NULL, odstepg DOUBLE PRECISION NOT NULL, odstepp DOUBLE PRECISION NOT NULL, odstepd DOUBLE PRECISION NOT NULL, odstepl DOUBLE PRECISION NOT NULL, czcionka VARCHAR(255) NOT NULL, rozmiar DOUBLE PRECISION NOT NULL, kolor VARCHAR(255) NOT NULL, pochylenie SMALLINT NOT NULL, pogrubienie SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE akapit ADD CONSTRAINT FK_A8B4A6FD4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE akapit ADD CONSTRAINT FK_A8B4A6FD7DB9A10A FOREIGN KEY (tytul_id) REFERENCES tytul (id)');
        $this->addSql('ALTER TABLE post ADD tytul_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D7DB9A10A FOREIGN KEY (tytul_id) REFERENCES tytul (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A8A6C8D7DB9A10A ON post (tytul_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D7DB9A10A');
        $this->addSql('ALTER TABLE akapit DROP FOREIGN KEY FK_A8B4A6FD7DB9A10A');
        $this->addSql('DROP TABLE akapit');
        $this->addSql('DROP TABLE tytul');
        $this->addSql('DROP INDEX UNIQ_5A8A6C8D7DB9A10A ON post');
        $this->addSql('ALTER TABLE post DROP tytul_id');
    }
}
