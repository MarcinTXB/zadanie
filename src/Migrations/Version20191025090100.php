<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191025090100 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post DROP czcion, DROP roz, DROP kolor, DROP italic, DROP bold, DROP odlg, DROP odlp, DROP odld, DROP odll');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post ADD czcion VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD roz DOUBLE PRECISION NOT NULL, ADD kolor VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD italic SMALLINT NOT NULL, ADD bold SMALLINT NOT NULL, ADD odlg DOUBLE PRECISION NOT NULL, ADD odlp DOUBLE PRECISION NOT NULL, ADD odld DOUBLE PRECISION NOT NULL, ADD odll DOUBLE PRECISION NOT NULL');
    }
}
