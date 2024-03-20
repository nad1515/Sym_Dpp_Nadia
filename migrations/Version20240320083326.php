<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240320083326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E9621F1E71F');
        $this->addSql('CREATE TABLE discussions (id_discussion INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, id_forum INT NOT NULL, nom_sujet VARCHAR(255) NOT NULL, libelle_sujet LONGTEXT NOT NULL, date_creation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_8B716B636B3CA4B (id_user), INDEX IDX_8B716B636BAEFFFD (id_forum), PRIMARY KEY(id_discussion)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE discussions ADD CONSTRAINT FK_8B716B636B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE discussions ADD CONSTRAINT FK_8B716B636BAEFFFD FOREIGN KEY (id_forum) REFERENCES forum (id_forum)');
        $this->addSql('ALTER TABLE discutions DROP FOREIGN KEY FK_33ADB3CE6B3CA4B');
        $this->addSql('ALTER TABLE discutions DROP FOREIGN KEY FK_33ADB3CE6BAEFFFD');
        $this->addSql('DROP TABLE discutions');
        $this->addSql('DROP INDEX IDX_DB021E9621F1E71F ON messages');
        $this->addSql('ALTER TABLE messages CHANGE id_discution id_discussion INT NOT NULL');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96653379D8 FOREIGN KEY (id_discussion) REFERENCES discussions (id_discussion)');
        $this->addSql('CREATE INDEX IDX_DB021E96653379D8 ON messages (id_discussion)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96653379D8');
        $this->addSql('CREATE TABLE discutions (id_discution INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, id_forum INT NOT NULL, nom_sujet VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, libelle_sujet LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_creation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_33ADB3CE6B3CA4B (id_user), INDEX IDX_33ADB3CE6BAEFFFD (id_forum), PRIMARY KEY(id_discution)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE discutions ADD CONSTRAINT FK_33ADB3CE6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE discutions ADD CONSTRAINT FK_33ADB3CE6BAEFFFD FOREIGN KEY (id_forum) REFERENCES forum (id_forum)');
        $this->addSql('ALTER TABLE discussions DROP FOREIGN KEY FK_8B716B636B3CA4B');
        $this->addSql('ALTER TABLE discussions DROP FOREIGN KEY FK_8B716B636BAEFFFD');
        $this->addSql('DROP TABLE discussions');
        $this->addSql('DROP INDEX IDX_DB021E96653379D8 ON messages');
        $this->addSql('ALTER TABLE messages CHANGE id_discussion id_discution INT NOT NULL');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E9621F1E71F FOREIGN KEY (id_discution) REFERENCES discutions (id_discution)');
        $this->addSql('CREATE INDEX IDX_DB021E9621F1E71F ON messages (id_discution)');
    }
}
