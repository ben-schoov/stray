<?php

namespace App\Entity;

use App\Repository\CityRouteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CityRouteRepository::class)]
class CityRoute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $cityKey = null;

    #[ORM\Column(length: 100)]
    private ?string $cityName = null;

    #[ORM\Column]
    private ?float $cityLatitude = null;

    #[ORM\Column]
    private ?float $cityLongitude = null;

    #[ORM\Column]
    private ?int $cityZoom = null;

    #[ORM\Column]
    private ?int $cityOrder = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $fromLabel = null;

    #[ORM\Column(length: 255)]
    private ?string $toLabel = null;

    #[ORM\Column]
    private ?float $startLatitude = null;

    #[ORM\Column]
    private ?float $startLongitude = null;

    #[ORM\Column]
    private ?float $endLatitude = null;

    #[ORM\Column]
    private ?float $endLongitude = null;

    #[ORM\Column(type: Types::JSON)]
    private array $stops = [];

    #[ORM\Column]
    private ?int $routeOrder = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCityKey(): ?string
    {
        return $this->cityKey;
    }

    public function setCityKey(string $cityKey): static
    {
        $this->cityKey = $cityKey;

        return $this;
    }

    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    public function setCityName(string $cityName): static
    {
        $this->cityName = $cityName;

        return $this;
    }

    public function getCityLatitude(): ?float
    {
        return $this->cityLatitude;
    }

    public function setCityLatitude(float $cityLatitude): static
    {
        $this->cityLatitude = $cityLatitude;

        return $this;
    }

    public function getCityLongitude(): ?float
    {
        return $this->cityLongitude;
    }

    public function setCityLongitude(float $cityLongitude): static
    {
        $this->cityLongitude = $cityLongitude;

        return $this;
    }

    public function getCityZoom(): ?int
    {
        return $this->cityZoom;
    }

    public function setCityZoom(int $cityZoom): static
    {
        $this->cityZoom = $cityZoom;

        return $this;
    }

    public function getCityOrder(): ?int
    {
        return $this->cityOrder;
    }

    public function setCityOrder(int $cityOrder): static
    {
        $this->cityOrder = $cityOrder;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getFromLabel(): ?string
    {
        return $this->fromLabel;
    }

    public function setFromLabel(string $fromLabel): static
    {
        $this->fromLabel = $fromLabel;

        return $this;
    }

    public function getToLabel(): ?string
    {
        return $this->toLabel;
    }

    public function setToLabel(string $toLabel): static
    {
        $this->toLabel = $toLabel;

        return $this;
    }

    public function getStartLatitude(): ?float
    {
        return $this->startLatitude;
    }

    public function setStartLatitude(float $startLatitude): static
    {
        $this->startLatitude = $startLatitude;

        return $this;
    }

    public function getStartLongitude(): ?float
    {
        return $this->startLongitude;
    }

    public function setStartLongitude(float $startLongitude): static
    {
        $this->startLongitude = $startLongitude;

        return $this;
    }

    public function getEndLatitude(): ?float
    {
        return $this->endLatitude;
    }

    public function setEndLatitude(float $endLatitude): static
    {
        $this->endLatitude = $endLatitude;

        return $this;
    }

    public function getEndLongitude(): ?float
    {
        return $this->endLongitude;
    }

    public function setEndLongitude(float $endLongitude): static
    {
        $this->endLongitude = $endLongitude;

        return $this;
    }

    public function getStops(): array
    {
        return $this->stops;
    }

    public function setStops(array $stops): static
    {
        $this->stops = $stops;

        return $this;
    }

    public function getRouteOrder(): ?int
    {
        return $this->routeOrder;
    }

    public function setRouteOrder(int $routeOrder): static
    {
        $this->routeOrder = $routeOrder;

        return $this;
    }
}
