<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230405095316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users_table ADD birth_date DATE NOT NULL, DROP birthdate');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_115E2B0FE7927C74 ON users_table (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_115E2B0FE7927C74 ON users_table');
        $this->addSql('ALTER TABLE users_table ADD birthdate INT NOT NULL, DROP birth_date');
    }
}
