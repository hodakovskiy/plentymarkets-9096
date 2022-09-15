<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220915135812 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE availability_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE market_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_text_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE availability (id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE availability_product (availability_id INT NOT NULL, product_id INT NOT NULL, PRIMARY KEY(availability_id, product_id))');
        $this->addSql('CREATE INDEX IDX_5C5EEF0661778466 ON availability_product (availability_id)');
        $this->addSql('CREATE INDEX IDX_5C5EEF064584665A ON availability_product (product_id)');
        $this->addSql('CREATE TABLE market (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE market_variations (market_id INT NOT NULL, variations_id INT NOT NULL, PRIMARY KEY(market_id, variations_id))');
        $this->addSql('CREATE INDEX IDX_354D0B42622F3F37 ON market_variations (market_id)');
        $this->addSql('CREATE INDEX IDX_354D0B426F28657C ON market_variations (variations_id)');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(5000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product_text (id INT NOT NULL, product_id INT DEFAULT NULL, lang VARCHAR(2) NOT NULL, name1 VARCHAR(255) DEFAULT NULL, name2 VARCHAR(255) DEFAULT NULL, name3 VARCHAR(255) DEFAULT NULL, short_description VARCHAR(1024) DEFAULT NULL, meta_description VARCHAR(1024) DEFAULT NULL, description VARCHAR(1024) DEFAULT NULL, technical_data VARCHAR(255) DEFAULT NULL, url_path VARCHAR(255) DEFAULT NULL, keywords VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B66385664584665A ON product_text (product_id)');
        $this->addSql('CREATE TABLE variations (id INT NOT NULL, product_id INT NOT NULL, number VARCHAR(255) DEFAULT NULL, category_name VARCHAR(255) DEFAULT NULL, product_model VARCHAR(255) DEFAULT NULL, barcode VARCHAR(255) DEFAULT NULL, price VARCHAR(255) DEFAULT NULL, unit_info VARCHAR(255) DEFAULT NULL, images VARCHAR(255) DEFAULT NULL, market_availabilities VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5BB35F5E4584665A ON variations (product_id)');
        $this->addSql('ALTER TABLE availability_product ADD CONSTRAINT FK_5C5EEF0661778466 FOREIGN KEY (availability_id) REFERENCES availability (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE availability_product ADD CONSTRAINT FK_5C5EEF064584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE market_variations ADD CONSTRAINT FK_354D0B42622F3F37 FOREIGN KEY (market_id) REFERENCES market (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE market_variations ADD CONSTRAINT FK_354D0B426F28657C FOREIGN KEY (variations_id) REFERENCES variations (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_text ADD CONSTRAINT FK_B66385664584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE variations ADD CONSTRAINT FK_5BB35F5E4584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE availability_product DROP CONSTRAINT FK_5C5EEF0661778466');
        $this->addSql('ALTER TABLE market_variations DROP CONSTRAINT FK_354D0B42622F3F37');
        $this->addSql('ALTER TABLE availability_product DROP CONSTRAINT FK_5C5EEF064584665A');
        $this->addSql('ALTER TABLE product_text DROP CONSTRAINT FK_B66385664584665A');
        $this->addSql('ALTER TABLE variations DROP CONSTRAINT FK_5BB35F5E4584665A');
        $this->addSql('ALTER TABLE market_variations DROP CONSTRAINT FK_354D0B426F28657C');
        $this->addSql('DROP SEQUENCE availability_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE market_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_text_id_seq CASCADE');
        $this->addSql('DROP TABLE availability');
        $this->addSql('DROP TABLE availability_product');
        $this->addSql('DROP TABLE market');
        $this->addSql('DROP TABLE market_variations');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_text');
        $this->addSql('DROP TABLE variations');
    }
}
