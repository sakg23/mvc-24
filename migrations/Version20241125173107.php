<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Migration to create the "book" table with necessary constraints.
 */
final class Version20241125173107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates the "book" table with a unique ISBN constraint.';
    }

    public function up(Schema $schema): void
    {
        $sm = $this->connection->getSchemaManager();
        if (!$sm->tablesExist(['book'])) {
            $this->addSql('CREATE TABLE book (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, isbn VARCHAR(13) NOT NULL, author VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL)');
            $this->addSql('CREATE UNIQUE INDEX UNIQ_CBE5A331CC1CF4E6 ON book (isbn)');
        }
    }
    
    public function down(Schema $schema): void
        // @phpmd-ignore-next-line

    {
    }
}
