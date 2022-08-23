<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220623141238 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rooms (id INT AUTO_INCREMENT NOT NULL, booked VARCHAR(10) NOT NULL, customer VARCHAR(255) NOT NULL, size VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category CHANGE title title VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE `order` CHANGE size size VARCHAR(10) NOT NULL, CHANGE customer customer VARCHAR(20) NOT NULL, CHANGE adress adress VARCHAR(30) NOT NULL, CHANGE pizza pizza VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE pizza CHANGE image image VARCHAR(40) NOT NULL');
        $this->addSql('ALTER TABLE size CHANGE size size VARCHAR(2) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rooms');
        $this->addSql('ALTER TABLE category CHANGE title title VARCHAR(15) NOT NULL');
        $this->addSql('ALTER TABLE `order` CHANGE size size VARCHAR(20) NOT NULL, CHANGE customer customer VARCHAR(50) NOT NULL, CHANGE adress adress VARCHAR(50) NOT NULL, CHANGE pizza pizza VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE pizza CHANGE image image VARCHAR(55) NOT NULL');
        $this->addSql('ALTER TABLE size CHANGE size size VARCHAR(20) NOT NULL');
    }
}
