<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220825072003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE show_case ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE show_case ADD CONSTRAINT FK_A4FF4FC79D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_A4FF4FC79D86650F ON show_case (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE show_case DROP FOREIGN KEY FK_A4FF4FC79D86650F');
        $this->addSql('DROP INDEX IDX_A4FF4FC79D86650F ON show_case');
        $this->addSql('ALTER TABLE show_case DROP user_id_id');
    }
}
