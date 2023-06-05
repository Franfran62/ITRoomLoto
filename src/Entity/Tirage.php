<?php

namespace App\Entity;

use App\Repository\TirageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TirageRepository::class)]
class Tirage
{
    #[ORM\Id]
    #[ORM\Column]
    private ?int $annee_numero_de_tirage = null;

    #[ORM\Column(length: 255)]
    private ?string $jour_de_tirage = null;

    #[ORM\Column(length: 255)]
    private ?string $date_de_tirage = null;

    #[ORM\Column(length: 255)]
    private ?string $date_de_forclusion = null;

    #[ORM\Column]
    private ?int $boule_1 = null;

    #[ORM\Column]
    private ?int $boule_2 = null;

    #[ORM\Column]
    private ?int $boule_3 = null;

    #[ORM\Column]
    private ?int $boule_4 = null;

    #[ORM\Column]
    private ?int $boule_5 = null;

    #[ORM\Column]
    private ?int $numero_chance = null;

    #[ORM\Column(length: 255)]
    private ?string $combinaison_gagnante_en_ordre_croissant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneeNumeroDeTirage(): ?int
    {
        return $this->annee_numero_de_tirage;
    }

    public function setAnneeNumeroDeTirage(int $annee_numero_de_tirage): self
    {
        $this->annee_numero_de_tirage = $annee_numero_de_tirage;

        return $this;
    }

    public function getJourDeTirage(): ?string
    {
        return $this->jour_de_tirage;
    }

    public function setJourDeTirage(string $jour_de_tirage): self
    {
        $this->jour_de_tirage = $jour_de_tirage;

        return $this;
    }

    public function getDateDeTirage(): ?string
    {
        return $this->date_de_tirage;
    }

    public function setDateDeTirage(string $date_de_tirage): self
    {
        $this->date_de_tirage = $date_de_tirage;

        return $this;
    }

    public function getDateDeForclusion(): ?string
    {
        return $this->date_de_forclusion;
    }

    public function setDateDeForclusion(string $date_de_forclusion): self
    {
        $this->date_de_forclusion = $date_de_forclusion;

        return $this;
    }

    public function getBoule1(): ?int
    {
        return $this->boule_1;
    }

    public function setBoule1(int $boule_1): self
    {
        $this->boule_1 = $boule_1;

        return $this;
    }

    public function getBoule2(): ?int
    {
        return $this->boule_2;
    }

    public function setBoule2(int $boule_2): self
    {
        $this->boule_2 = $boule_2;

        return $this;
    }

    public function getBoule3(): ?int
    {
        return $this->boule_3;
    }

    public function setBoule3(int $boule_3): self
    {
        $this->boule_3 = $boule_3;

        return $this;
    }

    public function getBoule4(): ?int
    {
        return $this->boule_4;
    }

    public function setBoule4(int $boule_4): self
    {
        $this->boule_4 = $boule_4;

        return $this;
    }

    public function getBoule5(): ?int
    {
        return $this->boule_5;
    }

    public function setBoule5(int $boule_5): self
    {
        $this->boule_5 = $boule_5;

        return $this;
    }

    public function getNumeroChance(): ?int
    {
        return $this->numero_chance;
    }

    public function setNumeroChance(int $numero_chance): self
    {
        $this->numero_chance = $numero_chance;

        return $this;
    }

    public function getCombinaisonGagnanteEnOrdreCroissant(): ?string
    {
        return $this->combinaison_gagnante_en_ordre_croissant;
    }

    public function setCombinaisonGagnanteEnOrdreCroissant(string $combinaison_gagnante_en_ordre_croissant): self
    {
        $this->combinaison_gagnante_en_ordre_croissant = $combinaison_gagnante_en_ordre_croissant;

        return $this;
    }
}
