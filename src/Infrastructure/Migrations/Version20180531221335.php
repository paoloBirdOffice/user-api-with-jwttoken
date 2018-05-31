<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180531221335 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Task ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Task ADD CONSTRAINT FK_F24C741B12469DE2 FOREIGN KEY (category_id) REFERENCES Category (id)');
        $this->addSql('CREATE INDEX IDX_F24C741B12469DE2 ON Task (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Task DROP FOREIGN KEY FK_F24C741B12469DE2');
        $this->addSql('DROP INDEX IDX_F24C741B12469DE2 ON Task');
        $this->addSql('ALTER TABLE Task DROP category_id');
    }
}
