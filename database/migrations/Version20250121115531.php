<?php

declare(strict_types=1);

namespace Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250121115531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'ALTER TABLE user_settings CHANGE name name VARCHAR(200) NOT NULL, CHANGE value value VARCHAR(100) NOT NULL'
        );
        $this->addSql(
            'ALTER TABLE users CHANGE email email VARCHAR(200) NOT NULL, CHANGE phone phone VARCHAR(32) DEFAULT NULL'
        );
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'ALTER TABLE user_settings CHANGE name name VARCHAR(255) NOT NULL, CHANGE value value VARCHAR(255) NOT NULL'
        );
        $this->addSql(
            'ALTER TABLE users CHANGE email email VARCHAR(250) NOT NULL, CHANGE phone phone VARCHAR(32) NOT NULL'
        );
    }
}
