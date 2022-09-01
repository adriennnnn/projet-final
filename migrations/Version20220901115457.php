<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220901115457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE show_case_category (show_case_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_142CFBA9A842F916 (show_case_id), INDEX IDX_142CFBA912469DE2 (category_id), PRIMARY KEY(show_case_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE show_case_category ADD CONSTRAINT FK_142CFBA9A842F916 FOREIGN KEY (show_case_id) REFERENCES show_case (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE show_case_category ADD CONSTRAINT FK_142CFBA912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE category_show_case');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_show_case (category_id INT NOT NULL, show_case_id INT NOT NULL, INDEX IDX_639F9DF712469DE2 (category_id), INDEX IDX_639F9DF7A842F916 (show_case_id), PRIMARY KEY(category_id, show_case_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category_show_case ADD CONSTRAINT FK_639F9DF712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_show_case ADD CONSTRAINT FK_639F9DF7A842F916 FOREIGN KEY (show_case_id) REFERENCES show_case (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE show_case_category');
        
    }
}
