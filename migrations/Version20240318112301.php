<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240318112301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP date_ajout');
        $this->addSql('ALTER TABLE commentaires ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP date_creation');
        $this->addSql('ALTER TABLE discutions ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP date_creation');
        $this->addSql('ALTER TABLE forum ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP date_creation');
        $this->addSql('ALTER TABLE messages ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP date_creation');
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles ADD date_ajout DATE NOT NULL, DROP created_at');
        $this->addSql('ALTER TABLE commentaires ADD date_creation DATE NOT NULL, DROP created_at');
        $this->addSql('ALTER TABLE discutions ADD date_creation DATE NOT NULL, DROP created_at');
        $this->addSql('ALTER TABLE forum ADD date_creation DATE NOT NULL, DROP created_at');
        $this->addSql('ALTER TABLE messages ADD date_creation DATE NOT NULL, DROP created_at');
        $this->addSql('ALTER TABLE user DROP is_verified');
    }
}
