<?php

namespace App\Entity;

use App\Repository\FormularzRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormularzRepository::class)
 */
class Formularz
{
   
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adres;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Opis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Flaga;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $FilesId;

 
   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function setUserId(string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->Adres;
    }

    public function setAdres(string $Adres): self
    {
        $this->Adres = $Adres;

        return $this;
    }

    public function getOpis(): ?string
    {
        return $this->Opis;
    }

    public function setOpis(?string $Opis): self
    {
        $this->Opis = $Opis;

        return $this;
    }

    public function getFlaga(): ?string
    {
        return $this->Flaga;
    }

    public function setFlaga(?string $Flaga): self
    {
        $this->Flaga = $Flaga;

        return $this;
    }

    public function getFilesId()
    {
        return $this->FilesId;
    }

    

    public function addFilesID($FilesID)
{
    $this->FilesID[] = $FilesID;

    return $this;
}
}
