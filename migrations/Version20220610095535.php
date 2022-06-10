<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220610095535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC7294869C');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A76ED395');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, tarif INT NOT NULL, average_duration VARCHAR(255) NOT NULL, place VARCHAR(255) NOT NULL, language VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity_filter (activity_id INT NOT NULL, filter_id INT NOT NULL, INDEX IDX_2DB2BF1D81C06096 (activity_id), INDEX IDX_2DB2BF1DD395B25E (filter_id), PRIMARY KEY(activity_id, filter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification (id INT AUTO_INCREMENT NOT NULL, classification VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dinosaur (id INT AUTO_INCREMENT NOT NULL, classification_id INT NOT NULL, common_name VARCHAR(255) NOT NULL, scientific_name VARCHAR(255) NOT NULL, length INT NOT NULL, height INT NOT NULL, weight INT NOT NULL, description LONGTEXT NOT NULL, img_height VARCHAR(255) NOT NULL, period VARCHAR(255) NOT NULL, regime VARCHAR(255) NOT NULL, localisation VARCHAR(255) NOT NULL, fossil VARCHAR(255) NOT NULL, INDEX IDX_DAEDC56E2A86559F (classification_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dinosaur_media (dinosaur_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_57146D124C3E9E0E (dinosaur_id), INDEX IDX_57146D12EA9FDD75 (media_id), PRIMARY KEY(dinosaur_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filter (id INT AUTO_INCREMENT NOT NULL, filter VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, dinosaur_id INT NOT NULL, url VARCHAR(255) NOT NULL, alt VARCHAR(255) NOT NULL, main_image TINYINT(1) NOT NULL, INDEX IDX_C53D045F4C3E9E0E (dinosaur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(20) NOT NULL, code LONGTEXT NOT NULL, suggestion TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE more_information (id INT AUTO_INCREMENT NOT NULL, dinosaur_id INT NOT NULL, image VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, alt VARCHAR(255) NOT NULL, INDEX IDX_DECA70424C3E9E0E (dinosaur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE timeline (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity_filter ADD CONSTRAINT FK_2DB2BF1D81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activity_filter ADD CONSTRAINT FK_2DB2BF1DD395B25E FOREIGN KEY (filter_id) REFERENCES filter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinosaur ADD CONSTRAINT FK_DAEDC56E2A86559F FOREIGN KEY (classification_id) REFERENCES classification (id)');
        $this->addSql('ALTER TABLE dinosaur_media ADD CONSTRAINT FK_57146D124C3E9E0E FOREIGN KEY (dinosaur_id) REFERENCES dinosaur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dinosaur_media ADD CONSTRAINT FK_57146D12EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F4C3E9E0E FOREIGN KEY (dinosaur_id) REFERENCES dinosaur (id)');
        $this->addSql('ALTER TABLE more_information ADD CONSTRAINT FK_DECA70424C3E9E0E FOREIGN KEY (dinosaur_id) REFERENCES dinosaur (id)');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity_filter DROP FOREIGN KEY FK_2DB2BF1D81C06096');
        $this->addSql('ALTER TABLE dinosaur DROP FOREIGN KEY FK_DAEDC56E2A86559F');
        $this->addSql('ALTER TABLE dinosaur_media DROP FOREIGN KEY FK_57146D124C3E9E0E');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F4C3E9E0E');
        $this->addSql('ALTER TABLE more_information DROP FOREIGN KEY FK_DECA70424C3E9E0E');
        $this->addSql('ALTER TABLE activity_filter DROP FOREIGN KEY FK_2DB2BF1DD395B25E');
        $this->addSql('ALTER TABLE dinosaur_media DROP FOREIGN KEY FK_57146D12EA9FDD75');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, titre VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, resume LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, datetime DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_23A0E66A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, user_id INT NOT NULL, commentaire LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, datetime DATETIME NOT NULL, INDEX IDX_67F068BCA76ED395 (user_id), INDEX IDX_67F068BC7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE activity_filter');
        $this->addSql('DROP TABLE classification');
        $this->addSql('DROP TABLE dinosaur');
        $this->addSql('DROP TABLE dinosaur_media');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE filter');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE more_information');
        $this->addSql('DROP TABLE timeline');
    }
}
