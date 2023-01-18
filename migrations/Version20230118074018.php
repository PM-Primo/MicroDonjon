<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230118074018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chap_combat (id INT AUTO_INCREMENT NOT NULL, chapitre_id INT DEFAULT NULL, monstre_id INT NOT NULL, texte_initial LONGTEXT NOT NULL, texte_victoire LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_6EC7DA431FBEEF7B (chapitre_id), INDEX IDX_6EC7DA43DAF13697 (monstre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chap_condition (id INT AUTO_INCREMENT NOT NULL, chapitre_id INT DEFAULT NULL, item_condition_id INT DEFAULT NULL, texte_si_vrai LONGTEXT NOT NULL, texte_si_faux LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_2BE2E9BA1FBEEF7B (chapitre_id), INDEX IDX_2BE2E9BA472D6E77 (item_condition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chap_standard (id INT AUTO_INCREMENT NOT NULL, chapitre_id INT DEFAULT NULL, item_prendre_id INT DEFAULT NULL, item_perdre_id INT DEFAULT NULL, texte_chapitre LONGTEXT NOT NULL, modif_gold INT DEFAULT NULL, modif_pv INT DEFAULT NULL, modif_attaque INT DEFAULT NULL, UNIQUE INDEX UNIQ_2D3EA0CD1FBEEF7B (chapitre_id), INDEX IDX_2D3EA0CDB02A5220 (item_prendre_id), INDEX IDX_2D3EA0CD7C034BA6 (item_perdre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chapitre (id INT AUTO_INCREMENT NOT NULL, zone_id INT DEFAULT NULL, titre_chapitre VARCHAR(255) DEFAULT NULL, type_page VARCHAR(50) NOT NULL, INDEX IDX_8C62B0259F2C3FAB (zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE combat (id INT AUTO_INCREMENT NOT NULL, aventurier_id INT DEFAULT NULL, monstres_id INT DEFAULT NULL, pvactuels_monstre INT NOT NULL, INDEX IDX_8D51E398EDDC7141 (aventurier_id), INDEX IDX_8D51E39889C04AF4 (monstres_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, nom_item VARCHAR(255) NOT NULL, image_item VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monstre (id INT AUTO_INCREMENT NOT NULL, nom_monstre VARCHAR(100) NOT NULL, pvmax_monstre INT NOT NULL, attaque_monstre INT NOT NULL, image_monstre VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sortie_combat (id INT AUTO_INCREMENT NOT NULL, chap_combat_id INT NOT NULL, chapitre_id INT NOT NULL, texte_lien LONGTEXT NOT NULL, INDEX IDX_8AA529246A4A8C41 (chap_combat_id), INDEX IDX_8AA529241FBEEF7B (chapitre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sortie_condition (id INT AUTO_INCREMENT NOT NULL, chap_condition_id INT NOT NULL, chapitre_id INT NOT NULL, condition_vrai TINYINT(1) DEFAULT NULL, texte_lien LONGTEXT NOT NULL, INDEX IDX_FA5786F16F30752C (chap_condition_id), INDEX IDX_FA5786F11FBEEF7B (chapitre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sortie_standard (id INT AUTO_INCREMENT NOT NULL, chap_standard_id INT NOT NULL, chapitre_id INT NOT NULL, texte_lien LONGTEXT NOT NULL, INDEX IDX_23361A699050614C (chap_standard_id), INDEX IDX_23361A691FBEEF7B (chapitre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(50) NOT NULL, pvmax INT NOT NULL, pvactuels INT NOT NULL, gold INT DEFAULT NULL, attaque INT NOT NULL, chapitre_en_cours INT DEFAULT NULL, date_victoire DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_zone (user_id INT NOT NULL, zone_id INT NOT NULL, INDEX IDX_DA6A8CCEA76ED395 (user_id), INDEX IDX_DA6A8CCE9F2C3FAB (zone_id), PRIMARY KEY(user_id, zone_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_item (user_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_659A69D7A76ED395 (user_id), INDEX IDX_659A69D7126F525E (item_id), PRIMARY KEY(user_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_chapitre (user_id INT NOT NULL, chapitre_id INT NOT NULL, INDEX IDX_6CEF5425A76ED395 (user_id), INDEX IDX_6CEF54251FBEEF7B (chapitre_id), PRIMARY KEY(user_id, chapitre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, nom_zone VARCHAR(255) NOT NULL, description_zone LONGTEXT DEFAULT NULL, fichier_map VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chap_combat ADD CONSTRAINT FK_6EC7DA431FBEEF7B FOREIGN KEY (chapitre_id) REFERENCES chapitre (id)');
        $this->addSql('ALTER TABLE chap_combat ADD CONSTRAINT FK_6EC7DA43DAF13697 FOREIGN KEY (monstre_id) REFERENCES monstre (id)');
        $this->addSql('ALTER TABLE chap_condition ADD CONSTRAINT FK_2BE2E9BA1FBEEF7B FOREIGN KEY (chapitre_id) REFERENCES chapitre (id)');
        $this->addSql('ALTER TABLE chap_condition ADD CONSTRAINT FK_2BE2E9BA472D6E77 FOREIGN KEY (item_condition_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE chap_standard ADD CONSTRAINT FK_2D3EA0CD1FBEEF7B FOREIGN KEY (chapitre_id) REFERENCES chapitre (id)');
        $this->addSql('ALTER TABLE chap_standard ADD CONSTRAINT FK_2D3EA0CDB02A5220 FOREIGN KEY (item_prendre_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE chap_standard ADD CONSTRAINT FK_2D3EA0CD7C034BA6 FOREIGN KEY (item_perdre_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE chapitre ADD CONSTRAINT FK_8C62B0259F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE combat ADD CONSTRAINT FK_8D51E398EDDC7141 FOREIGN KEY (aventurier_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE combat ADD CONSTRAINT FK_8D51E39889C04AF4 FOREIGN KEY (monstres_id) REFERENCES monstre (id)');
        $this->addSql('ALTER TABLE sortie_combat ADD CONSTRAINT FK_8AA529246A4A8C41 FOREIGN KEY (chap_combat_id) REFERENCES chap_combat (id)');
        $this->addSql('ALTER TABLE sortie_combat ADD CONSTRAINT FK_8AA529241FBEEF7B FOREIGN KEY (chapitre_id) REFERENCES chapitre (id)');
        $this->addSql('ALTER TABLE sortie_condition ADD CONSTRAINT FK_FA5786F16F30752C FOREIGN KEY (chap_condition_id) REFERENCES chap_condition (id)');
        $this->addSql('ALTER TABLE sortie_condition ADD CONSTRAINT FK_FA5786F11FBEEF7B FOREIGN KEY (chapitre_id) REFERENCES chapitre (id)');
        $this->addSql('ALTER TABLE sortie_standard ADD CONSTRAINT FK_23361A699050614C FOREIGN KEY (chap_standard_id) REFERENCES chap_standard (id)');
        $this->addSql('ALTER TABLE sortie_standard ADD CONSTRAINT FK_23361A691FBEEF7B FOREIGN KEY (chapitre_id) REFERENCES chapitre (id)');
        $this->addSql('ALTER TABLE user_zone ADD CONSTRAINT FK_DA6A8CCEA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_zone ADD CONSTRAINT FK_DA6A8CCE9F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_item ADD CONSTRAINT FK_659A69D7A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_item ADD CONSTRAINT FK_659A69D7126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_chapitre ADD CONSTRAINT FK_6CEF5425A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_chapitre ADD CONSTRAINT FK_6CEF54251FBEEF7B FOREIGN KEY (chapitre_id) REFERENCES chapitre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chap_combat DROP FOREIGN KEY FK_6EC7DA431FBEEF7B');
        $this->addSql('ALTER TABLE chap_combat DROP FOREIGN KEY FK_6EC7DA43DAF13697');
        $this->addSql('ALTER TABLE chap_condition DROP FOREIGN KEY FK_2BE2E9BA1FBEEF7B');
        $this->addSql('ALTER TABLE chap_condition DROP FOREIGN KEY FK_2BE2E9BA472D6E77');
        $this->addSql('ALTER TABLE chap_standard DROP FOREIGN KEY FK_2D3EA0CD1FBEEF7B');
        $this->addSql('ALTER TABLE chap_standard DROP FOREIGN KEY FK_2D3EA0CDB02A5220');
        $this->addSql('ALTER TABLE chap_standard DROP FOREIGN KEY FK_2D3EA0CD7C034BA6');
        $this->addSql('ALTER TABLE chapitre DROP FOREIGN KEY FK_8C62B0259F2C3FAB');
        $this->addSql('ALTER TABLE combat DROP FOREIGN KEY FK_8D51E398EDDC7141');
        $this->addSql('ALTER TABLE combat DROP FOREIGN KEY FK_8D51E39889C04AF4');
        $this->addSql('ALTER TABLE sortie_combat DROP FOREIGN KEY FK_8AA529246A4A8C41');
        $this->addSql('ALTER TABLE sortie_combat DROP FOREIGN KEY FK_8AA529241FBEEF7B');
        $this->addSql('ALTER TABLE sortie_condition DROP FOREIGN KEY FK_FA5786F16F30752C');
        $this->addSql('ALTER TABLE sortie_condition DROP FOREIGN KEY FK_FA5786F11FBEEF7B');
        $this->addSql('ALTER TABLE sortie_standard DROP FOREIGN KEY FK_23361A699050614C');
        $this->addSql('ALTER TABLE sortie_standard DROP FOREIGN KEY FK_23361A691FBEEF7B');
        $this->addSql('ALTER TABLE user_zone DROP FOREIGN KEY FK_DA6A8CCEA76ED395');
        $this->addSql('ALTER TABLE user_zone DROP FOREIGN KEY FK_DA6A8CCE9F2C3FAB');
        $this->addSql('ALTER TABLE user_item DROP FOREIGN KEY FK_659A69D7A76ED395');
        $this->addSql('ALTER TABLE user_item DROP FOREIGN KEY FK_659A69D7126F525E');
        $this->addSql('ALTER TABLE user_chapitre DROP FOREIGN KEY FK_6CEF5425A76ED395');
        $this->addSql('ALTER TABLE user_chapitre DROP FOREIGN KEY FK_6CEF54251FBEEF7B');
        $this->addSql('DROP TABLE chap_combat');
        $this->addSql('DROP TABLE chap_condition');
        $this->addSql('DROP TABLE chap_standard');
        $this->addSql('DROP TABLE chapitre');
        $this->addSql('DROP TABLE combat');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE monstre');
        $this->addSql('DROP TABLE sortie_combat');
        $this->addSql('DROP TABLE sortie_condition');
        $this->addSql('DROP TABLE sortie_standard');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_zone');
        $this->addSql('DROP TABLE user_item');
        $this->addSql('DROP TABLE user_chapitre');
        $this->addSql('DROP TABLE zone');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
