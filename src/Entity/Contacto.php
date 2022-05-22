<?php

namespace App\Entity;

use App\Repository\ContactoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactoRepository::class)]
class Contacto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $nombre;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $apellidos;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Assert\LessThan(10)]
    private $telefono;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Email]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Choice(['Turismo', 'Todoterreno', 'Comercial'])]
    private $tipoVehiculo;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Choice(['Astra', 'Corsa', 'Mokka'])]
    private $vehiculo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\Choice(['Mañana', 'Tarde', 'Noche'])]
    private $preferenciaLlamada;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getTelefono(): ?int
    {
        return $this->telefono;
    }

    public function setTelefono(?int $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTipoVehiculo(): ?string
    {
        return $this->tipoVehiculo;
    }

    public function setTipoVehiculo(string $tipoVehiculo): self
    {
        $this->tipoVehiculo = $tipoVehiculo;

        return $this;
    }

    public function getVehiculo(): ?string
    {
        return $this->vehiculo;
    }

    public function setVehiculo(string $vehiculo): self
    {
        $this->vehiculo = $vehiculo;

        return $this;
    }

    public function getPreferenciaLlamada(): ?string
    {
        return $this->preferenciaLlamada;
    }

    public function setPreferenciaLlamada(?string $preferenciaLlamada): self
    {
        $this->preferenciaLlamada = $preferenciaLlamada;

        return $this;
    }
}