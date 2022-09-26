<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220923095924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE web_stores_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE web_stores (id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, store_identifier INT NOT NULL, name VARCHAR(255) DEFAULT NULL, plugin_set_id INT DEFAULT NULL, configuration JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE "order" RENAME COLUMN client_namme TO client_name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE web_stores_id_seq CASCADE');
        $this->addSql('DROP TABLE web_stores');
        $this->addSql('ALTER TABLE "order" RENAME COLUMN client_name TO client_namme');
    }
}
