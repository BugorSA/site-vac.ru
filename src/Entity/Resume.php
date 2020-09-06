<?php

namespace App\Entity;

use App\Repository\ResumeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ResumeRepository::class)
 */
class Resume
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank()
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $area;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $expected_profit;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $provider;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fran_checks;

    /**
     * @ORM\Column(type="text")
     */
    private $about_me;

    /**
     * @ORM\Column(type="text")
     */
    private $about_future;

    /**
     * @ORM\Column(type="datetime")
     */
    private $departure_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(string $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getExpectedProfit(): ?string
    {
        return $this->expected_profit;
    }

    public function setExpectedProfit(string $expected_profit): self
    {
        $this->expected_profit = $expected_profit;

        return $this;
    }

    public function getProvider(): ?string
    {
        return $this->provider;
    }

    public function setProvider(string $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    public function getFranChecks(): ?bool
    {
        return $this->fran_checks;
    }

    public function setFranChecks(bool $fran_checks): self
    {
        $this->fran_checks = $fran_checks;

        return $this;
    }

    public function getAboutMe(): ?string
    {
        return $this->about_me;
    }

    public function setAboutMe(string $about_me): self
    {
        $this->about_me = $about_me;

        return $this;
    }

    public function getAboutFuture(): ?string
    {
        return $this->about_future;
    }

    public function setAboutFuture(string $about_future): self
    {
        $this->about_future = $about_future;

        return $this;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departure_date;
    }

    public function setDepartureDate(\DateTimeInterface $departure_date): self
    {
        $this->departure_date = $departure_date;

        return $this;
    }
}
