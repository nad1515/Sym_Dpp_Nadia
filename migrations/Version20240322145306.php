<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240322145306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messages CHANGE parent_id parent_id INT NOT NULL');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96727ACA70 FOREIGN KEY (parent_id) REFERENCES messages (id_message)');
        $this->addSql('CREATE INDEX IDX_DB021E96727ACA70 ON messages (parent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96727ACA70');
        $this->addSql('DROP INDEX IDX_DB021E96727ACA70 ON messages');
        $this->addSql('ALTER TABLE messages CHANGE parent_id parent_id INT DEFAULT NULL');
    }
}
