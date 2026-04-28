<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260421113000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates city_route table and seeds default routes';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE city_route (id INT AUTO_INCREMENT NOT NULL, city_key VARCHAR(100) NOT NULL, city_name VARCHAR(100) NOT NULL, city_latitude DOUBLE PRECISION NOT NULL, city_longitude DOUBLE PRECISION NOT NULL, city_zoom INT NOT NULL, city_order INT NOT NULL, title VARCHAR(255) NOT NULL, from_label VARCHAR(255) NOT NULL, to_label VARCHAR(255) NOT NULL, start_latitude DOUBLE PRECISION NOT NULL, start_longitude DOUBLE PRECISION NOT NULL, end_latitude DOUBLE PRECISION NOT NULL, end_longitude DOUBLE PRECISION NOT NULL, stops JSON NOT NULL, route_order INT NOT NULL, INDEX IDX_CITY_ROUTE_CITY_KEY (city_key), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('INSERT INTO city_route (city_key, city_name, city_latitude, city_longitude, city_zoom, city_order, title, from_label, to_label, start_latitude, start_longitude, end_latitude, end_longitude, stops, route_order) VALUES
            (\'leuven\', \'Leuven\', 50.8798, 4.7005, 13, 1, \'Station to Grand Beguinage\', \'Leuven Station\', \'Grand Beguinage\', 50.8829, 4.7154, 50.8738, 4.7009, \'[{\"name\":\"M Ladeuzeplein\",\"coords\":[50.8791,4.7047]},{\"name\":\"Old Market\",\"coords\":[50.8773,4.6998]}]\', 1),
            (\'leuven\', \'Leuven\', 50.8798, 4.7005, 13, 1, \'Town Hall to Arenberg Castle\', \'Town Hall\', \'Arenberg Castle\', 50.8797, 4.7003, 50.8655, 4.6843, \'[{\"name\":\"Sint-Donatus Park\",\"coords\":[50.8786,4.6952]}]\', 2),
            (\'leuven\', \'Leuven\', 50.8798, 4.7005, 13, 1, \'Botanical Garden to Park Abbey\', \'Botanical Garden\', \'Park Abbey\', 50.8793, 4.6939, 50.8673, 4.7254, \'[{\"name\":\"De Bruul\",\"coords\":[50.8738,4.7042]}]\', 3),
            (\'brussels\', \'Brussels\', 50.8503, 4.3517, 12, 2, \'Grand Place to Cinquantenaire\', \'Grand Place\', \'Parc du Cinquantenaire\', 50.8467, 4.3525, 50.8416, 4.3862, \'[{\"name\":\"Royal Palace\",\"coords\":[50.8419,4.3676]}]\', 1),
            (\'brussels\', \'Brussels\', 50.8503, 4.3517, 12, 2, \'Central Station to Atomium\', \'Brussels Central\', \'Atomium\', 50.8454, 4.3572, 50.8949, 4.3416, \'[{\"name\":\"Tour and Taxis\",\"coords\":[50.8698,4.3475]},{\"name\":\"Laeken Park\",\"coords\":[50.8859,4.3522]}]\', 2),
            (\'brussels\', \'Brussels\', 50.8503, 4.3517, 12, 2, \'Sablon to European Quarter\', \'Sablon\', \'Parc Leopold\', 50.8396, 4.3585, 50.8389, 4.3828, \'[{\"name\":\"Palais de Justice\",\"coords\":[50.8379,4.3515]}]\', 3),
            (\'antwerp\', \'Antwerp\', 51.2194, 4.4025, 12, 3, \'Central Station to MAS\', \'Antwerp Central\', \'Museum aan de Stroom\', 51.2172, 4.4210, 51.2290, 4.4046, \'[{\"name\":\"Meir\",\"coords\":[51.2184,4.4103]}]\', 1),
            (\'antwerp\', \'Antwerp\', 51.2194, 4.4025, 12, 3, \'Cathedral to Zurenborg\', \'Cathedral of Our Lady\', \'Dageraadplaats\', 51.2203, 4.4014, 51.2051, 4.4312, \'[{\"name\":\"Stadspark\",\"coords\":[51.2138,4.4167]}]\', 2),
            (\'antwerp\', \'Antwerp\', 51.2194, 4.4025, 12, 3, \'Steen to Middelheim Park\', \'Het Steen\', \'Middelheim Park\', 51.2210, 4.3984, 51.1915, 4.4219, \'[{\"name\":\"KMSKA\",\"coords\":[51.2091,4.3954]}]\', 3)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE city_route');
    }
}
