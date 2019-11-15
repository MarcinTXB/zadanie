<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191025082109 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post DROP tresc, CHANGE tytul tytul VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE akapit ADD odlt LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD rozt DOUBLE PRECISION NOT NULL, ADD kolort VARCHAR(255) NOT NULL, ADD italict SMALLINT NOT NULL, ADD boldt SMALLINT NOT NULL, ADD odl LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD czcion VARCHAR(255) NOT NULL, ADD roz DOUBLE PRECISION NOT NULL, ADD italic SMALLINT NOT NULL, ADD bold SMALLINT NOT NULL, DROP odstepg, DROP odstepp, DROP odstepd, DROP odstepl, DROP rozmiar, DROP pochylenie, DROP pogrubienie, CHANGE czcionka czciont VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE akapit ADD odstepg DOUBLE PRECISION NOT NULL, ADD odstepp DOUBLE PRECISION NOT NULL, ADD odstepd DOUBLE PRECISION NOT NULL, ADD odstepl DOUBLE PRECISION NOT NULL, ADD czcionka VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD rozmiar DOUBLE PRECISION NOT NULL, ADD pochylenie SMALLINT NOT NULL, ADD pogrubienie SMALLINT NOT NULL, DROP odlt, DROP czciont, DROP rozt, DROP kolort, DROP italict, DROP boldt, DROP odl, DROP czcion, DROP roz, DROP italic, DROP bold');
        $this->addSql('ALTER TABLE post ADD tresc LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE tytul tytul LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
