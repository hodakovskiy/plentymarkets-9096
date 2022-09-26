<?php

namespace App\Entity;

use App\Repository\WebStoresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WebStoresRepository::class)
 */
class WebStores
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $storeIdentifier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pluginSetId;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $configuration = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getStoreIdentifier(): ?int
    {
        return $this->storeIdentifier;
    }

    public function setStoreIdentifier(int $storeIdentifier): self
    {
        $this->storeIdentifier = $storeIdentifier;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPluginSetId(): ?int
    {
        return $this->pluginSetId;
    }

    public function setPluginSetId(?int $pluginSetId): self
    {
        $this->pluginSetId = $pluginSetId;

        return $this;
    }

    public function getConfiguration(): ?array
    {
        return $this->configuration;
    }

      public function setConfiguration(?array $configuration): self
    {
        $this->configuration = $configuration;

        return $this;
    }
}
