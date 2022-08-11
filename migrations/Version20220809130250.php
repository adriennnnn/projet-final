<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220809130250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE show_case ADD company_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE show_case ADD CONSTRAINT FK_A4FF4FC738B53C32 FOREIGN KEY (company_id_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_A4FF4FC738B53C32 ON show_case (company_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE show_case DROP FOREIGN KEY FK_A4FF4FC738B53C32');
        $this->addSql('DROP INDEX IDX_A4FF4FC738B53C32 ON show_case');
        $this->addSql('ALTER TABLE show_case DROP company_id_id');
    }
}
