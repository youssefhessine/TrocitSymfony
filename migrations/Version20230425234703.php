<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230425234703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE troc DROP FOREIGN KEY offre_troc');
        $this->addSql('ALTER TABLE troc DROP FOREIGN KEY offre_troc1');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY club_communaute');
        $this->addSql('ALTER TABLE don DROP FOREIGN KEY don_ibfk_1');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY user_offre');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY categorie_offre');
        $this->addSql('ALTER TABLE rapport DROP FOREIGN KEY rapport_expertise');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY daa');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY da');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE cagnotte');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE communauté');
        $this->addSql('DROP TABLE don');
        $this->addSql('DROP TABLE expertise');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE rapport');
        $this->addSql('DROP TABLE rating');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE views');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY user_livreur');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY troc_livraison');
        $this->addSql('ALTER TABLE livraison CHANGE id_troc id_troc INT DEFAULT NULL, CHANGE id_livreur id_livreur INT DEFAULT NULL, CHANGE etat_livraison etat_livraison VARCHAR(256) NOT NULL');
        $this->addSql('DROP INDEX id_troc ON livraison');
        $this->addSql('CREATE INDEX IDX_A60C9F1F2F920F61 ON livraison (id_troc)');
        $this->addSql('DROP INDEX id_livreur ON livraison');
        $this->addSql('CREATE INDEX IDX_A60C9F1F35E7E71D ON livraison (id_livreur)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT user_livreur FOREIGN KEY (id_livreur) REFERENCES user (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT troc_livraison FOREIGN KEY (id_troc) REFERENCES troc (id_troc)');
        $this->addSql('DROP INDEX produit1ref_2 ON troc');
        $this->addSql('DROP INDEX produit1ref ON troc');
        $this->addSql('DROP INDEX offre_troc1 ON troc');
        $this->addSql('DROP INDEX IDX_A4B213638E22C9EA ON troc');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY user_wallet');
        $this->addSql('ALTER TABLE user CHANGE id_wallet id_wallet INT DEFAULT NULL');
        $this->addSql('DROP INDEX id_wallet ON user');
        $this->addSql('CREATE INDEX IDX_8D93D6495A5F27F2 ON user (id_wallet)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT user_wallet FOREIGN KEY (id_wallet) REFERENCES wallet (id_wallet)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, responsable VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, metier VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, adresse VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, image VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cagnotte (id INT AUTO_INCREMENT NOT NULL, somme INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE categorie (nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(nom)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE club (Id INT AUTO_INCREMENT NOT NULL, Club_name VARCHAR(250) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Manager_name VARCHAR(250) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Capacity INT NOT NULL, Location VARCHAR(250) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Id_communaute INT NOT NULL, INDEX Id_communaute (Id_communaute), PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE communauté (Id INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(250) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Description VARCHAR(250) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Type VARCHAR(250) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Location VARCHAR(250) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Date DATE NOT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE don (id INT AUTO_INCREMENT NOT NULL, id_association INT NOT NULL, nom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, produit VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date DATE NOT NULL, jeton INT NOT NULL, image VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX cle (id_association), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE expertise (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(256) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, titre VARCHAR(256) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, nbr_pers INT NOT NULL, trv_pers INT NOT NULL, adresse VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, montant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, id_user INT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date DATE NOT NULL, image_filename VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX id_user (id_user), INDEX nom_categorie (nom_categorie), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE rapport (reference INT AUTO_INCREMENT NOT NULL, id_expertise INT NOT NULL, titre_rapport VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description_produit VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date_rapport DATE NOT NULL, image VARCHAR(254) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX id_expertise (id_expertise), PRIMARY KEY(reference)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE rating (id INT AUTO_INCREMENT NOT NULL, id_comm INT NOT NULL, id_utilisateur INT NOT NULL, avis VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, rate INT NOT NULL, INDEX da (id_comm), INDEX daa (id_utilisateur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(222) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE views (id INT AUTO_INCREMENT NOT NULL, id_offre INT NOT NULL, id_user INT NOT NULL, nom_categorie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT club_communaute FOREIGN KEY (Id_communaute) REFERENCES communauté (Id)');
        $this->addSql('ALTER TABLE don ADD CONSTRAINT don_ibfk_1 FOREIGN KEY (id_association) REFERENCES association (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT user_offre FOREIGN KEY (id_user) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT categorie_offre FOREIGN KEY (nom_categorie) REFERENCES categorie (nom)');
        $this->addSql('ALTER TABLE rapport ADD CONSTRAINT rapport_expertise FOREIGN KEY (id_expertise) REFERENCES expertise (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT daa FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT da FOREIGN KEY (id_comm) REFERENCES communauté (Id)');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F2F920F61');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F35E7E71D');
        $this->addSql('ALTER TABLE livraison CHANGE id_troc id_troc INT NOT NULL, CHANGE id_livreur id_livreur INT NOT NULL, CHANGE etat_livraison etat_livraison VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX idx_a60c9f1f35e7e71d ON livraison');
        $this->addSql('CREATE INDEX id_livreur ON livraison (id_livreur)');
        $this->addSql('DROP INDEX idx_a60c9f1f2f920f61 ON livraison');
        $this->addSql('CREATE INDEX id_troc ON livraison (id_troc)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F2F920F61 FOREIGN KEY (id_troc) REFERENCES troc (id_troc)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F35E7E71D FOREIGN KEY (id_livreur) REFERENCES user (id)');
        $this->addSql('ALTER TABLE troc ADD CONSTRAINT offre_troc FOREIGN KEY (produit1ref) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE troc ADD CONSTRAINT offre_troc1 FOREIGN KEY (produit2ref) REFERENCES offre (id)');
        $this->addSql('CREATE INDEX produit1ref_2 ON troc (produit1ref, produit2ref)');
        $this->addSql('CREATE INDEX produit1ref ON troc (produit1ref, produit2ref)');
        $this->addSql('CREATE INDEX offre_troc1 ON troc (produit2ref)');
        $this->addSql('CREATE INDEX IDX_A4B213638E22C9EA ON troc (produit1ref)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495A5F27F2');
        $this->addSql('ALTER TABLE user CHANGE id_wallet id_wallet INT NOT NULL');
        $this->addSql('DROP INDEX idx_8d93d6495a5f27f2 ON user');
        $this->addSql('CREATE INDEX id_wallet ON user (id_wallet)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495A5F27F2 FOREIGN KEY (id_wallet) REFERENCES wallet (id_wallet)');
    }
}
