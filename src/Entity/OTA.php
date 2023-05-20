<?php

namespace App\Entity;

use App\Repository\OTARepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OTARepository::class)]
class OTA
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $name1 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $name2 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $filename = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $size = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $url = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $version = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $filehash = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $maintainers = [];

    #[ORM\Column(type: Types::TEXT)]
    private ?string $info_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datetime = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName1(): ?string
    {
        return $this->name1;
    }

    public function setName1(string $name1): self
    {
        $this->name1 = $name1;

        return $this;
    }

    public function getName2(): ?string
    {
        return $this->name2;
    }

    public function setName2(string $name2): self
    {
        $this->name2 = $name2;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getFilehash(): ?string
    {
        return $this->filehash;
    }

    public function setFilehash(string $filehash): self
    {
        $this->filehash = $filehash;

        return $this;
    }

    public function getMaintainers(): array
    {
        return $this->maintainers;
    }

    public function setMaintainers(array $maintainers): self
    {
        $this->maintainers = $maintainers;

        return $this;
    }

    public function getInfoId(): ?string
    {
        return $this->info_id;
    }

    public function setInfoId(string $info_id): self
    {
        $this->info_id = $info_id;

        return $this;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }
}
