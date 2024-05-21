<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240310133620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, travel_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, address VARCHAR(150) NOT NULL, price DOUBLE PRECISION DEFAULT NULL, info VARCHAR(150) DEFAULT NULL, radio VARCHAR(50) NOT NULL, INDEX IDX_AC74095AECAB15B3 (travel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE description (id INT AUTO_INCREMENT NOT NULL, travel_id INT DEFAULT NULL, text LONGTEXT NOT NULL, INDEX IDX_6DE44026ECAB15B3 (travel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE host (id INT AUTO_INCREMENT NOT NULL, travel_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, address VARCHAR(150) NOT NULL, phone VARCHAR(50) DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, info VARCHAR(150) DEFAULT NULL, radio VARCHAR(50) NOT NULL, INDEX IDX_CF2713FDECAB15B3 (travel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, travel_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, address VARCHAR(150) NOT NULL, time TIME DEFAULT NULL, price DOUBLE PRECISION NOT NULL, info VARCHAR(150) DEFAULT NULL, radio VARCHAR(50) NOT NULL, INDEX IDX_5E9E89CBECAB15B3 (travel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, travel_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, address VARCHAR(150) NOT NULL, info VARCHAR(150) DEFAULT NULL, INDEX IDX_EB95123FECAB15B3 (travel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE route (id INT AUTO_INCREMENT NOT NULL, travel_id INT DEFAULT NULL, place_start VARCHAR(150) NOT NULL, place_end VARCHAR(150) NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, time_start TIME NOT NULL, time_end TIME NOT NULL, nb_vehicule VARCHAR(50) DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, radio VARCHAR(50) NOT NULL, INDEX IDX_2C42079ECAB15B3 (travel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE travel (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, nb_passenger INT NOT NULL, country VARCHAR(50) NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, INDEX IDX_2D0B6BCEFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(50) NOT NULL, first_name VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, pwd VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095AECAB15B3 FOREIGN KEY (travel_id) REFERENCES travel (id)');
        $this->addSql('ALTER TABLE description ADD CONSTRAINT FK_6DE44026ECAB15B3 FOREIGN KEY (travel_id) REFERENCES travel (id)');
        $this->addSql('ALTER TABLE host ADD CONSTRAINT FK_CF2713FDECAB15B3 FOREIGN KEY (travel_id) REFERENCES travel (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBECAB15B3 FOREIGN KEY (travel_id) REFERENCES travel (id)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FECAB15B3 FOREIGN KEY (travel_id) REFERENCES travel (id)');
        $this->addSql('ALTER TABLE route ADD CONSTRAINT FK_2C42079ECAB15B3 FOREIGN KEY (travel_id) REFERENCES travel (id)');
        $this->addSql('ALTER TABLE travel ADD CONSTRAINT FK_2D0B6BCEFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095AECAB15B3');
        $this->addSql('ALTER TABLE description DROP FOREIGN KEY FK_6DE44026ECAB15B3');
        $this->addSql('ALTER TABLE host DROP FOREIGN KEY FK_CF2713FDECAB15B3');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CBECAB15B3');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FECAB15B3');
        $this->addSql('ALTER TABLE route DROP FOREIGN KEY FK_2C42079ECAB15B3');
        $this->addSql('ALTER TABLE travel DROP FOREIGN KEY FK_2D0B6BCEFB88E14F');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE description');
        $this->addSql('DROP TABLE host');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE route');
        $this->addSql('DROP TABLE travel');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
