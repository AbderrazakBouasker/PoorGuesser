<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230604121354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, final_score INT DEFAULT NULL, creation_date DATETIME DEFAULT NULL, INDEX IDX_232B318C9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, game_id_id INT NOT NULL, score INT DEFAULT NULL, guess_x DOUBLE PRECISION DEFAULT NULL, guess_y DOUBLE PRECISION DEFAULT NULL, real_x DOUBLE PRECISION DEFAULT NULL, real_y DOUBLE PRECISION DEFAULT NULL, INDEX IDX_329937514D77E7D8 (game_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_329937514D77E7D8 FOREIGN KEY (game_id_id) REFERENCES game (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C9D86650F');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937514D77E7D8');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE score');
    }
}
