<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191021130550 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, temat_id INT NOT NULL, username VARCHAR(255) NOT NULL, user_avatar_filename VARCHAR(255) NOT NULL, tresc LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_5A8A6C8DF9D34AD1 (temat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DF9D34AD1 FOREIGN KEY (temat_id) REFERENCES Temat (id)');
        $this->addSql('DROP TABLE temat_post');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE temat_post (id INT AUTO_INCREMENT NOT NULL, temat_id INT NOT NULL, username VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, user_avatar_filename VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, tresc LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, created_at DATETIME NOT NULL, INDEX IDX_3DCDDF18F9D34AD1 (temat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE temat_post ADD CONSTRAINT FK_3DCDDF18F9D34AD1 FOREIGN KEY (temat_id) REFERENCES Temat (id)');
        $this->addSql('DROP TABLE post');
    }
}
