<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191025095439 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post ADD odgt DOUBLE PRECISION NOT NULL, ADD odpt DOUBLE PRECISION NOT NULL, ADD oddt DOUBLE PRECISION NOT NULL, ADD odlt DOUBLE PRECISION NOT NULL, DROP odlgt, DROP odlpt, DROP odldt, DROP odllt');
        $this->addSql('ALTER TABLE akapit ADD odgt DOUBLE PRECISION NOT NULL, ADD odpt DOUBLE PRECISION NOT NULL, ADD oddt DOUBLE PRECISION NOT NULL, ADD odlt DOUBLE PRECISION NOT NULL, ADD odg DOUBLE PRECISION NOT NULL, ADD odp DOUBLE PRECISION NOT NULL, ADD odd DOUBLE PRECISION NOT NULL, ADD odl DOUBLE PRECISION NOT NULL, DROP odlgt, DROP odlpt, DROP odldt, DROP odllt, DROP odlg, DROP odlp, DROP odld, DROP odll');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE akapit ADD odlgt DOUBLE PRECISION NOT NULL, ADD odlpt DOUBLE PRECISION NOT NULL, ADD odldt DOUBLE PRECISION NOT NULL, ADD odllt DOUBLE PRECISION NOT NULL, ADD odlg DOUBLE PRECISION NOT NULL, ADD odlp DOUBLE PRECISION NOT NULL, ADD odld DOUBLE PRECISION NOT NULL, ADD odll DOUBLE PRECISION NOT NULL, DROP odgt, DROP odpt, DROP oddt, DROP odlt, DROP odg, DROP odp, DROP odd, DROP odl');
        $this->addSql('ALTER TABLE post ADD odlgt DOUBLE PRECISION NOT NULL, ADD odlpt DOUBLE PRECISION NOT NULL, ADD odldt DOUBLE PRECISION NOT NULL, ADD odllt DOUBLE PRECISION NOT NULL, DROP odgt, DROP odpt, DROP oddt, DROP odlt');
    }
}
