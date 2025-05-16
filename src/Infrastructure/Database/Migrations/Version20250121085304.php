<?php

declare(strict_types=1);

namespace Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250121085304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TABLE user_settings (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_5C844C5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(250) NOT NULL, phone VARCHAR(32) NOT NULL, password VARCHAR(255) NOT NULL, uid VARCHAR(36) NOT NULL, first_name VARCHAR(120) NOT NULL, last_name VARCHAR(120) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_1483A5E9539B0606 (uid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE user_settings ADD CONSTRAINT FK_5C844C5A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)'
        );
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_settings DROP FOREIGN KEY FK_5C844C5A76ED395');
        $this->addSql('DROP TABLE user_settings');
        $this->addSql('DROP TABLE users');
    }
}
