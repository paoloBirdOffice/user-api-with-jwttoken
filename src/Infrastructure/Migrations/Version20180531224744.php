<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180531224744 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Tags ADD task_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Tags ADD CONSTRAINT FK_CF8E3B188DB60186 FOREIGN KEY (task_id) REFERENCES Task (id)');
        $this->addSql('CREATE INDEX IDX_CF8E3B188DB60186 ON Tags (task_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Tags DROP FOREIGN KEY FK_CF8E3B188DB60186');
        $this->addSql('DROP INDEX IDX_CF8E3B188DB60186 ON Tags');
        $this->addSql('ALTER TABLE Tags DROP task_id');
    }
}
