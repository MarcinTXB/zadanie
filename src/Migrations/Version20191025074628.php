<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191025074628 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE akapit DROP FOREIGN KEY FK_A8B4A6FD7DB9A10A');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D7DB9A10A');
        $this->addSql('DROP TABLE tytul');
        $this->addSql('DROP INDEX UNIQ_A8B4A6FD7DB9A10A ON akapit');
        $this->addSql('ALTER TABLE akapit DROP tytul_id');
        $this->addSql('DROP INDEX UNIQ_5A8A6C8D7DB9A10A ON post');
        $this->addSql('ALTER TABLE post ADD tytul LONGTEXT NOT NULL, ADD odlt LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD czciont VARCHAR(255) NOT NULL, ADD rozt DOUBLE PRECISION NOT NULL, ADD kolort VARCHAR(255) NOT NULL, ADD italict SMALLINT NOT NULL, ADD boldt SMALLINT NOT NULL, ADD odl LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD czcion VARCHAR(255) NOT NULL, ADD roz DOUBLE PRECISION NOT NULL, ADD kolor VARCHAR(255) NOT NULL, ADD italic SMALLINT NOT NULL, ADD bold SMALLINT NOT NULL, DROP tytul_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tytul (id INT AUTO_INCREMENT NOT NULL, tresc VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, odstepg DOUBLE PRECISION NOT NULL, odstepp DOUBLE PRECISION NOT NULL, odstepd DOUBLE PRECISION NOT NULL, odstepl DOUBLE PRECISION NOT NULL, czcionka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, rozmiar DOUBLE PRECISION NOT NULL, kolor VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, pochylenie SMALLINT NOT NULL, pogrubienie SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE akapit ADD tytul_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE akapit ADD CONSTRAINT FK_A8B4A6FD7DB9A10A FOREIGN KEY (tytul_id) REFERENCES tytul (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A8B4A6FD7DB9A10A ON akapit (tytul_id)');
        $this->addSql('ALTER TABLE post ADD tytul_id INT DEFAULT NULL, DROP tytul, DROP odlt, DROP czciont, DROP rozt, DROP kolort, DROP italict, DROP boldt, DROP odl, DROP czcion, DROP roz, DROP kolor, DROP italic, DROP bold');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D7DB9A10A FOREIGN KEY (tytul_id) REFERENCES tytul (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A8A6C8D7DB9A10A ON post (tytul_id)');
    }
}
