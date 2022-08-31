<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220831120514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_show_case (category_id INT NOT NULL, show_case_id INT NOT NULL, INDEX IDX_639F9DF712469DE2 (category_id), INDEX IDX_639F9DF7A842F916 (show_case_id), PRIMARY KEY(category_id, show_case_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_show_case ADD CONSTRAINT FK_639F9DF712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_show_case ADD CONSTRAINT FK_639F9DF7A842F916 FOREIGN KEY (show_case_id) REFERENCES show_case (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_show_case DROP FOREIGN KEY FK_639F9DF712469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_show_case');
    }
}
