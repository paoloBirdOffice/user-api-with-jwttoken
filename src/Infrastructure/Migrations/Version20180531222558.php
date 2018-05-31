<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180531222558 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Task ADD status_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Task ADD CONSTRAINT FK_F24C741B6BF700BD FOREIGN KEY (status_id) REFERENCES Status (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F24C741B6BF700BD ON Task (status_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Task DROP FOREIGN KEY FK_F24C741B6BF700BD');
        $this->addSql('DROP INDEX UNIQ_F24C741B6BF700BD ON Task');
        $this->addSql('ALTER TABLE Task DROP status_id');
    }
}
