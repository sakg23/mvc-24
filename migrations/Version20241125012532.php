<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241125012532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates the product and messenger_messages tables.';
    }

    public function createTables(Schema $schema): void
        // @phpmd-ignore-next-line

    {
        // Add SQL for creating tables
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function removeTables(Schema $schema): void
    {
        // Add SQL for removing tables
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE messenger_messages');
    }

    public function up(Schema $schema): void
        // @phpmd-ignore-next-line

    {
        // Call the refactored createTables method
        $this->createTables($schema);
    }

    public function down(Schema $schema): void
    {
        // Call the refactored removeTables method
        $this->removeTables($schema);
    }
}
