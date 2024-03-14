<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240314112751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messages ADD discutions_id INT NOT NULL');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E969AFF5C67 FOREIGN KEY (discutions_id) REFERENCES discutions (id)');
        $this->addSql('CREATE INDEX IDX_DB021E969AFF5C67 ON messages (discutions_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E969AFF5C67');
        $this->addSql('DROP INDEX IDX_DB021E969AFF5C67 ON messages');
        $this->addSql('ALTER TABLE messages DROP discutions_id');
    }
}
