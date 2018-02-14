<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180201111641 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, isan VARCHAR(30) NOT NULL, title VARCHAR(120) NOT NULL, director VARCHAR(120) NOT NULL, actors TEXT NOT NULL COMMENT \'(DC2Type:simple_array)\', release_date DATE NOT NULL, duration SMALLINT DEFAULT NULL, resume LONGTEXT DEFAULT NULL, price SMALLINT DEFAULT NULL, UNIQUE INDEX UNIQ_1D5EF26FE731A725 (isan), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, isnb VARCHAR(20) NOT NULL, title VARCHAR(120) NOT NULL, author VARCHAR(120) NOT NULL, release_date DATE NOT NULL, pages SMALLINT DEFAULT NULL, resume LONGTEXT DEFAULT NULL, price SMALLINT DEFAULT NULL, UNIQUE INDEX UNIQ_CBE5A331691FF7C1 (isnb), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE book');
    }
}
