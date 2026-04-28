<?php

namespace App\Repository;

use App\Entity\CityRoute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CityRoute>
 */
class CityRouteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CityRoute::class);
    }

    public function getCityData(): array
    {
        /** @var CityRoute[] $routes */
        $routes = $this->createQueryBuilder('r')
            ->orderBy('r.cityOrder', 'ASC')
            ->addOrderBy('r.routeOrder', 'ASC')
            ->getQuery()
            ->getResult();

        $cityData = [];

        foreach ($routes as $route) {
            $cityKey = $route->getCityKey();
            if ($cityKey === null) {
                continue;
            }

            if (!isset($cityData[$cityKey])) {
                $cityData[$cityKey] = [
                    'name' => $route->getCityName(),
                    'coords' => [$route->getCityLatitude(), $route->getCityLongitude()],
                    'zoom' => $route->getCityZoom(),
                    'routes' => [],
                ];
            }

            $cityData[$cityKey]['routes'][] = [
                'title' => $route->getTitle(),
                'from' => $route->getFromLabel(),
                'to' => $route->getToLabel(),
                'start' => [$route->getStartLatitude(), $route->getStartLongitude()],
                'stops' => $route->getStops(),
                'end' => [$route->getEndLatitude(), $route->getEndLongitude()],
            ];
        }

        return $cityData;
    }
}
