<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220822121811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(5000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE variations (id INT NOT NULL, product_id INT NOT NULL, number VARCHAR(255) DEFAULT NULL, category_name VARCHAR(255) DEFAULT NULL, product_model VARCHAR(255) DEFAULT NULL, barcode VARCHAR(255) DEFAULT NULL, price VARCHAR(255) DEFAULT NULL, unit_info VARCHAR(255) DEFAULT NULL, images VARCHAR(255) DEFAULT NULL, market_availabilities VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5BB35F5E4584665A ON variations (product_id)');
        $this->addSql('ALTER TABLE variations ADD CONSTRAINT FK_5BB35F5E4584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE variations DROP CONSTRAINT FK_5BB35F5E4584665A');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE variations');
    }
}
