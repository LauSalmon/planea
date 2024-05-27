<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240522114639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE routes (id INT AUTO_INCREMENT NOT NULL, travel_id INT DEFAULT NULL, place_start VARCHAR(150) NOT NULL, place_end VARCHAR(150) NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, time_start TIME NOT NULL, time_end TIME NOT NULL, nb_vehicule VARCHAR(50) DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, radio VARCHAR(50) NOT NULL, INDEX IDX_32D5C2B3ECAB15B3 (travel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE routes ADD CONSTRAINT FK_32D5C2B3ECAB15B3 FOREIGN KEY (travel_id) REFERENCES travel (id)');
        $this->addSql('ALTER TABLE route DROP FOREIGN KEY FK_2C42079ECAB15B3');
        $this->addSql('DROP TABLE route');
        $this->addSql('ALTER TABLE utilisateur ADD roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE route (id INT AUTO_INCREMENT NOT NULL, travel_id INT DEFAULT NULL, place_start VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, place_end VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, time_start TIME NOT NULL, time_end TIME NOT NULL, nb_vehicule VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, price DOUBLE PRECISION DEFAULT NULL, radio VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_2C42079ECAB15B3 (travel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE route ADD CONSTRAINT FK_2C42079ECAB15B3 FOREIGN KEY (travel_id) REFERENCES travel (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE routes DROP FOREIGN KEY FK_32D5C2B3ECAB15B3');
        $this->addSql('DROP TABLE routes');
        $this->addSql('ALTER TABLE utilisateur DROP roles');
    }
}
