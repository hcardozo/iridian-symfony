<?php

namespace App\Entity;

use App\Repository\AreaContactoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AreaContactoRepository::class)
 */
class AreaContacto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="nombre_area", type="string", length=255)
     */
    private $nombreArea;

    /**
     * @ORM\OneToMany(targetEntity="Contacto", mappedBy="area_de_contacto")
     */
    private $contacto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreArea(): ?string
    {
        return $this->nombreArea;
    }

    public function setNombreArea(string $nombreArea): self
    {
        $this->nombreArea = $nombreArea;

        return $this;
    }
}
