<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191025084556 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post ADD odlgt DOUBLE PRECISION NOT NULL, ADD odlpt DOUBLE PRECISION NOT NULL, ADD odldt DOUBLE PRECISION NOT NULL, ADD odllt DOUBLE PRECISION NOT NULL, ADD odlg DOUBLE PRECISION NOT NULL, ADD odlp DOUBLE PRECISION NOT NULL, ADD odld DOUBLE PRECISION NOT NULL, ADD odll DOUBLE PRECISION NOT NULL, DROP odlt, DROP odl');
        $this->addSql('ALTER TABLE akapit ADD odlgt DOUBLE PRECISION NOT NULL, ADD odlpt DOUBLE PRECISION NOT NULL, ADD odldt DOUBLE PRECISION NOT NULL, ADD odllt DOUBLE PRECISION NOT NULL, ADD odlg DOUBLE PRECISION NOT NULL, ADD odlp DOUBLE PRECISION NOT NULL, ADD odld DOUBLE PRECISION NOT NULL, ADD odll DOUBLE PRECISION NOT NULL, DROP odlt, DROP odl');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE akapit ADD odlt LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', ADD odl LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', DROP odlgt, DROP odlpt, DROP odldt, DROP odllt, DROP odlg, DROP odlp, DROP odld, DROP odll');
        $this->addSql('ALTER TABLE post ADD odlt LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', ADD odl LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', DROP odlgt, DROP odlpt, DROP odldt, DROP odllt, DROP odlg, DROP odlp, DROP odld, DROP odll');
    }
}
