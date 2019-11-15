<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191019112829 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE genus_note DROP FOREIGN KEY FK_6478FCEC85C4074C');
        $this->addSql('CREATE TABLE Temat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, sub_family VARCHAR(255) NOT NULL, species_count INT NOT NULL, fun_fact VARCHAR(255) DEFAULT NULL, is_published TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE temat_post (id INT AUTO_INCREMENT NOT NULL, temat_id INT NOT NULL, username VARCHAR(255) NOT NULL, user_avatar_filename VARCHAR(255) NOT NULL, tresc LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_3DCDDF18F9D34AD1 (temat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE temat_post ADD CONSTRAINT FK_3DCDDF18F9D34AD1 FOREIGN KEY (temat_id) REFERENCES Temat (id)');
        $this->addSql('DROP TABLE genus');
        $this->addSql('DROP TABLE genus_note');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE temat_post DROP FOREIGN KEY FK_3DCDDF18F9D34AD1');
        $this->addSql('CREATE TABLE genus (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, sub_family VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, species_count INT NOT NULL, fun_fact VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, is_published TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE genus_note (id INT AUTO_INCREMENT NOT NULL, genus_id INT NOT NULL, username VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, user_avatar_filename VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, note LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, created_at DATETIME NOT NULL, INDEX IDX_6478FCEC85C4074C (genus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE genus_note ADD CONSTRAINT FK_6478FCEC85C4074C FOREIGN KEY (genus_id) REFERENCES genus (id)');
        $this->addSql('DROP TABLE Temat');
        $this->addSql('DROP TABLE temat_post');
    }
}
