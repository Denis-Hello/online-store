<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241111185542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE addresses_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE answers_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE brands_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE categories_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE comments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "order_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE order_item_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_photos_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_sizes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE products_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE questions_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ratings_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sizes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE addresses (id INT NOT NULL, user_id INT NOT NULL, region VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, street VARCHAR(255) NOT NULL, house_number VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6FCA7516A76ED395 ON addresses (user_id)');
        $this->addSql('CREATE TABLE answers (id INT NOT NULL, question_id INT NOT NULL, text TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_50D0C6061E27F6BF ON answers (question_id)');
        $this->addSql('COMMENT ON COLUMN answers.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE brands (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE categories (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE comments (id INT NOT NULL, product_id INT NOT NULL, user_id INT NOT NULL, text TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5F9E962A4584665A ON comments (product_id)');
        $this->addSql('CREATE INDEX IDX_5F9E962AA76ED395 ON comments (user_id)');
        $this->addSql('COMMENT ON COLUMN comments.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "order" (id INT NOT NULL, dilivery_addres_id INT NOT NULL, user_id INT NOT NULL, order_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, status INT NOT NULL, discount INT DEFAULT NULL, total_amount INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F5299398A086249A ON "order" (dilivery_addres_id)');
        $this->addSql('CREATE INDEX IDX_F5299398A76ED395 ON "order" (user_id)');
        $this->addSql('COMMENT ON COLUMN "order".order_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE order_item (id INT NOT NULL, order_id INT NOT NULL, product_id INT NOT NULL, volume INT NOT NULL, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_52EA1F098D9F6D38 ON order_item (order_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_52EA1F094584665A ON order_item (product_id)');
        $this->addSql('CREATE TABLE product_photos (id INT NOT NULL, product_id INT NOT NULL, photo_url VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6A0AA17D4584665A ON product_photos (product_id)');
        $this->addSql('CREATE TABLE product_sizes (id INT NOT NULL, product_id INT NOT NULL, size_id INT NOT NULL, stock INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_17C2FC354584665A ON product_sizes (product_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_17C2FC35498DA827 ON product_sizes (size_id)');
        $this->addSql('CREATE TABLE products (id INT NOT NULL, brand_id INT NOT NULL, category_id INT NOT NULL, size_id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, price INT NOT NULL, gender INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A44F5D008 ON products (brand_id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A12469DE2 ON products (category_id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A498DA827 ON products (size_id)');
        $this->addSql('CREATE TABLE questions (id INT NOT NULL, product_id INT NOT NULL, user_id INT NOT NULL, text TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8ADC54D54584665A ON questions (product_id)');
        $this->addSql('CREATE INDEX IDX_8ADC54D5A76ED395 ON questions (user_id)');
        $this->addSql('COMMENT ON COLUMN questions.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE ratings (id INT NOT NULL, product_id INT NOT NULL, user_id INT NOT NULL, value INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_CEB607C94584665A ON ratings (product_id)');
        $this->addSql('CREATE INDEX IDX_CEB607C9A76ED395 ON ratings (user_id)');
        $this->addSql('COMMENT ON COLUMN ratings.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE sizes (id INT NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password JSON NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, patronymic VARCHAR(255) NOT NULL, phone_number INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
        $this->addSql('ALTER TABLE addresses ADD CONSTRAINT FK_6FCA7516A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE answers ADD CONSTRAINT FK_50D0C6061E27F6BF FOREIGN KEY (question_id) REFERENCES questions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A4584665A FOREIGN KEY (product_id) REFERENCES products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F5299398A086249A FOREIGN KEY (dilivery_addres_id) REFERENCES addresses (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F098D9F6D38 FOREIGN KEY (order_id) REFERENCES "order" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F094584665A FOREIGN KEY (product_id) REFERENCES products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_photos ADD CONSTRAINT FK_6A0AA17D4584665A FOREIGN KEY (product_id) REFERENCES products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_sizes ADD CONSTRAINT FK_17C2FC354584665A FOREIGN KEY (product_id) REFERENCES products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_sizes ADD CONSTRAINT FK_17C2FC35498DA827 FOREIGN KEY (size_id) REFERENCES sizes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A44F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A498DA827 FOREIGN KEY (size_id) REFERENCES sizes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D54584665A FOREIGN KEY (product_id) REFERENCES products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D5A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ratings ADD CONSTRAINT FK_CEB607C94584665A FOREIGN KEY (product_id) REFERENCES products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ratings ADD CONSTRAINT FK_CEB607C9A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE addresses_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE answers_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE brands_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE categories_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE comments_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "order_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE order_item_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_photos_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_sizes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE products_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE questions_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ratings_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sizes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('ALTER TABLE addresses DROP CONSTRAINT FK_6FCA7516A76ED395');
        $this->addSql('ALTER TABLE answers DROP CONSTRAINT FK_50D0C6061E27F6BF');
        $this->addSql('ALTER TABLE comments DROP CONSTRAINT FK_5F9E962A4584665A');
        $this->addSql('ALTER TABLE comments DROP CONSTRAINT FK_5F9E962AA76ED395');
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F5299398A086249A');
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F5299398A76ED395');
        $this->addSql('ALTER TABLE order_item DROP CONSTRAINT FK_52EA1F098D9F6D38');
        $this->addSql('ALTER TABLE order_item DROP CONSTRAINT FK_52EA1F094584665A');
        $this->addSql('ALTER TABLE product_photos DROP CONSTRAINT FK_6A0AA17D4584665A');
        $this->addSql('ALTER TABLE product_sizes DROP CONSTRAINT FK_17C2FC354584665A');
        $this->addSql('ALTER TABLE product_sizes DROP CONSTRAINT FK_17C2FC35498DA827');
        $this->addSql('ALTER TABLE products DROP CONSTRAINT FK_B3BA5A5A44F5D008');
        $this->addSql('ALTER TABLE products DROP CONSTRAINT FK_B3BA5A5A12469DE2');
        $this->addSql('ALTER TABLE products DROP CONSTRAINT FK_B3BA5A5A498DA827');
        $this->addSql('ALTER TABLE questions DROP CONSTRAINT FK_8ADC54D54584665A');
        $this->addSql('ALTER TABLE questions DROP CONSTRAINT FK_8ADC54D5A76ED395');
        $this->addSql('ALTER TABLE ratings DROP CONSTRAINT FK_CEB607C94584665A');
        $this->addSql('ALTER TABLE ratings DROP CONSTRAINT FK_CEB607C9A76ED395');
        $this->addSql('DROP TABLE addresses');
        $this->addSql('DROP TABLE answers');
        $this->addSql('DROP TABLE brands');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE "order"');
        $this->addSql('DROP TABLE order_item');
        $this->addSql('DROP TABLE product_photos');
        $this->addSql('DROP TABLE product_sizes');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE ratings');
        $this->addSql('DROP TABLE sizes');
        $this->addSql('DROP TABLE "user"');
    }
}
