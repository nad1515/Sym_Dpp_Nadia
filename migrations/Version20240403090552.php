<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240403090552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messages ADD id_discussion INT NOT NULL, DROP discussions_id');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96653379D8 FOREIGN KEY (id_discussion) REFERENCES discussions (id_discussion)');
        $this->addSql('CREATE INDEX IDX_DB021E96653379D8 ON messages (id_discussion)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96653379D8');
        $this->addSql('DROP INDEX IDX_DB021E96653379D8 ON messages');
        $this->addSql('ALTER TABLE messages ADD discussions_id INT DEFAULT NULL, DROP id_discussion');
    }
}
