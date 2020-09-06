<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200906175256 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resume ADD expected_profit VARCHAR(100) NOT NULL, ADD provider VARCHAR(100) NOT NULL, ADD fran_checks TINYINT(1) NOT NULL, ADD about_me LONGTEXT NOT NULL, ADD about_future LONGTEXT NOT NULL, ADD departure_date DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resume DROP expected_profit, DROP provider, DROP fran_checks, DROP about_me, DROP about_future, DROP departure_date');
    }
}
