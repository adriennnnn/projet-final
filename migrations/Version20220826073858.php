<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220826073858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image_show_case (id INT AUTO_INCREMENT NOT NULL, show_case_id_id INT NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_7C7D949323466012 (show_case_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image_show_case ADD CONSTRAINT FK_7C7D949323466012 FOREIGN KEY (show_case_id_id) REFERENCES show_case (id)');
        $this->addSql('ALTER TABLE show_case DROP image');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE image_show_case');
        $this->addSql('ALTER TABLE show_case ADD image VARCHAR(255) DEFAULT NULL');
    }
}
