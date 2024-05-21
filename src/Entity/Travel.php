<?php

namespace App\Entity;

use App\Repository\TravelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TravelRepository::class)]
class Travel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $nbPassenger = null;

    #[ORM\Column(length: 50)]
    private ?string $country = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateStart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEnd = null;

    #[ORM\OneToMany(targetEntity: Restaurant::class, mappedBy: 'travel')]
    private Collection $restaurants;

    #[ORM\OneToMany(targetEntity: Description::class, mappedBy: 'travel')]
    private Collection $descriptions;

    #[ORM\OneToMany(targetEntity: Routes::class, mappedBy: 'travel')]
    private Collection $routes;

    #[ORM\OneToMany(targetEntity: Location::class, mappedBy: 'travel')]
    private Collection $locations;

    #[ORM\OneToMany(targetEntity: Host::class, mappedBy: 'travel')]
    private Collection $hosts;

    #[ORM\OneToMany(targetEntity: Activity::class, mappedBy: 'travel')]
    private Collection $activities;

    #[ORM\ManyToOne(inversedBy: 'travel')]
    private ?Utilisateur $utilisateur = null;

    public function __construct()
    {
        $this->restaurants = new ArrayCollection();
        $this->descriptions = new ArrayCollection();
        $this->routes = new ArrayCollection();
        $this->locations = new ArrayCollection();
        $this->hosts = new ArrayCollection();
        $this->activities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getNbPassenger(): ?int
    {
        return $this->nbPassenger;
    }

    public function setNbPassenger(int $nbPassenger): static
    {
        $this->nbPassenger = $nbPassenger;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): static
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): static
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * @return Collection<int, Restaurant>
     */
    public function getRestaurants(): Collection
    {
        return $this->restaurants;
    }

    public function addRestaurant(Restaurant $restaurant): static
    {
        if (!$this->restaurants->contains($restaurant)) {
            $this->restaurants->add($restaurant);
            $restaurant->setTravel($this);
        }

        return $this;
    }

    public function removeRestaurant(Restaurant $restaurant): static
    {
        if ($this->restaurants->removeElement($restaurant)) {
            // set the owning side to null (unless already changed)
            if ($restaurant->getTravel() === $this) {
                $restaurant->setTravel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Description>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }

    public function addDescription(Description $description): static
    {
        if (!$this->descriptions->contains($description)) {
            $this->descriptions->add($description);
            $description->setTravel($this);
        }

        return $this;
    }

    public function removeDescription(Description $description): static
    {
        if ($this->descriptions->removeElement($description)) {
            // set the owning side to null (unless already changed)
            if ($description->getTravel() === $this) {
                $description->setTravel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Routes>
     */
    public function getRoutes(): Collection
    {
        return $this->routes;
    }

    public function addRoute(Routes $route): static
    {
        if (!$this->routes->contains($route)) {
            $this->routes->add($route);
            $route->setTravel($this);
        }

        return $this;
    }

    public function removeRoute(Routes $route): static
    {
        if ($this->routes->removeElement($route)) {
            // set the owning side to null (unless already changed)
            if ($route->getTravel() === $this) {
                $route->setTravel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): static
    {
        if (!$this->locations->contains($location)) {
            $this->locations->add($location);
            $location->setTravel($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): static
    {
        if ($this->locations->removeElement($location)) {
            // set the owning side to null (unless already changed)
            if ($location->getTravel() === $this) {
                $location->setTravel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Host>
     */
    public function getHosts(): Collection
    {
        return $this->hosts;
    }

    public function addHost(Host $host): static
    {
        if (!$this->hosts->contains($host)) {
            $this->hosts->add($host);
            $host->setTravel($this);
        }

        return $this;
    }

    public function removeHost(Host $host): static
    {
        if ($this->hosts->removeElement($host)) {
            // set the owning side to null (unless already changed)
            if ($host->getTravel() === $this) {
                $host->setTravel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Activity>
     */
    public function getActivities(): Collection
    {
        return $this->activities;
    }

    public function addActivity(Activity $activity): static
    {
        if (!$this->activities->contains($activity)) {
            $this->activities->add($activity);
            $activity->setTravel($this);
        }

        return $this;
    }

    public function removeActivity(Activity $activity): static
    {
        if ($this->activities->removeElement($activity)) {
            // set the owning side to null (unless already changed)
            if ($activity->getTravel() === $this) {
                $activity->setTravel(null);
            }
        }

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
