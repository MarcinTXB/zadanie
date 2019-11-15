<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
/*
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;*/


/**
 * @ORM\Entity(repositoryClass="App\Repository\AkapitRepository")
 */
class Akapit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tytul;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tresc;

      
   
    
    
    /**
     * @ORM\Column(type="float")
     */
    private $odgt;
    
    /**
     * @ORM\Column(type="float")
     */
    private $odpt;
    
    /**
     * @ORM\Column(type="float")
     */
    private $oddt;
    
    /**
     * @ORM\Column(type="float")
     */
    private $odlt;
    
    /**
     * @ORM\Column(type="float")
     */
    private $rozt;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kolort;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $italict;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $boldt;
    
    
    /**
     * @ORM\Column(type="float")
     */
    private $odg;
    
    /**
     * @ORM\Column(type="float")
     */
    private $odp;
    
    /**
     * @ORM\Column(type="float")
     */
    private $odd;
    
    /**
     * @ORM\Column(type="float")
     */
    private $odl;
    
    /**
     * @ORM\Column(type="float")
     */
    private $roz;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kolor;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $italic;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $bold;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post", inversedBy="akapity")
     */
    private $post;

    /*     
     * @ORM\OneToMany(targetEntity="Image", orphanRemoval=true, cascade={"persist", "remove"}, mappedBy="akapit")
     *
    private $images;
    
    */
    
    
    
    /**
     * @return string
     */
    public function __toString()
    {
        return \sprintf('%s', $this->tresc);
    }
    
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTresc(): ?string
    {
        return $this->tresc;
    }

    public function setTresc(?string $tresc): self
    {
        $this->tresc = $tresc;

        return $this;
    }


    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
    {
        $this->post = $post;

        return $this;
    }

    public function getOdlt(): ?float
    {
        return $this->odlt;
    }

    public function setOdlt(float $odlt): self
    {
        $this->odlt = $odlt;

        return $this;
    }

    public function getRozt(): ?float
    {
        return $this->rozt;
    }

    public function setRozt(float $rozt): self
    {
        $this->rozt = $rozt;

        return $this;
    }

    public function getKolort(): ?string
    {
        return $this->kolort;
    }

    public function setKolort(string $kolort): self
    {
        $this->kolort = $kolort;

        return $this;
    }

    public function getItalict(): ?bool
    {
        return $this->italict;
    }

    public function setItalict(bool $italict): self
    {
        $this->italict = $italict;

        return $this;
    }

    public function getBoldt(): ?bool
    {
        return $this->boldt;
    }

    public function setBoldt(bool $boldt): self
    {
        $this->boldt = $boldt;

        return $this;
    }

    public function getOdl(): ?float
    {
        return $this->odl;
    }

    public function setOdl(float $odl): self
    {
        $this->odl = $odl;

        return $this;
    }

    public function getRoz(): ?float
    {
        return $this->roz;
    }

    public function setRoz(float $roz): self
    {
        $this->roz = $roz;

        return $this;
    }

    public function getKolor(): ?string
    {
        return $this->kolor;
    }

    public function setKolor(string $kolor): self
    {
        $this->kolor = $kolor;

        return $this;
    }

    public function getItalic(): ?bool
    {
        return $this->italic;
    }

    public function setItalic(bool $italic): self
    {
        $this->italic = $italic;

        return $this;
    }

    public function getBold(): ?bool
    {
        return $this->bold;
    }

    public function setBold(bool $bold): self
    {
        $this->bold = $bold;

        return $this;
    }

    public function getOdlgt(): ?float
    {
        return $this->odlgt;
    }

    public function setOdlgt(float $odlgt): self
    {
        $this->odlgt = $odlgt;

        return $this;
    }

    public function getOdlpt(): ?float
    {
        return $this->odlpt;
    }

    public function setOdlpt(float $odlpt): self
    {
        $this->odlpt = $odlpt;

        return $this;
    }

    public function getOdldt(): ?float
    {
        return $this->odldt;
    }

    public function setOdldt(float $odldt): self
    {
        $this->odldt = $odldt;

        return $this;
    }

    public function getOdllt(): ?float
    {
        return $this->odllt;
    }

    public function setOdllt(float $odllt): self
    {
        $this->odllt = $odllt;

        return $this;
    }

    public function getOdlg(): ?float
    {
        return $this->odlg;
    }

    public function setOdlg(float $odlg): self
    {
        $this->odlg = $odlg;

        return $this;
    }

    public function getOdlp(): ?float
    {
        return $this->odlp;
    }

    public function setOdlp(float $odlp): self
    {
        $this->odlp = $odlp;

        return $this;
    }

    public function getOdld(): ?float
    {
        return $this->odld;
    }

    public function setOdld(float $odld): self
    {
        $this->odld = $odld;

        return $this;
    }

    public function getOdll(): ?float
    {
        return $this->odll;
    }

    public function setOdll(float $odll): self
    {
        $this->odll = $odll;

        return $this;
    }

    public function getOdgt(): ?float
    {
        return $this->odgt;
    }

    public function setOdgt(float $odgt): self
    {
        $this->odgt = $odgt;

        return $this;
    }

    public function getOdpt(): ?float
    {
        return $this->odpt;
    }

    public function setOdpt(float $odpt): self
    {
        $this->odpt = $odpt;

        return $this;
    }

    public function getOddt(): ?float
    {
        return $this->oddt;
    }

    public function setOddt(float $oddt): self
    {
        $this->oddt = $oddt;

        return $this;
    }

    public function getOdg(): ?float
    {
        return $this->odg;
    }

    public function setOdg(float $odg): self
    {
        $this->odg = $odg;

        return $this;
    }

    public function getOdp(): ?float
    {
        return $this->odp;
    }

    public function setOdp(float $odp): self
    {
        $this->odp = $odp;

        return $this;
    }

    public function getOdd(): ?float
    {
        return $this->odd;
    }

    public function setOdd(float $odd): self
    {
        $this->odd = $odd;

        return $this;
    }

    public function getTytul(): ?string
    {
        return $this->tytul;
    }

    public function setTytul(string $tytul): self
    {
        $this->tytul = $tytul;

        return $this;
    }

    
    /*
    public function getImages()
    {
        return $this->images;
    }
    
    public function addImage(Image $image)
    {
        if (false === $this->images->contains($image)) {
            $image->setAkapit($this);
            $this->images->add($image);
        }
    }
    
    public function removeImage(Image $image)
    {
        if (true === $this->images->contains($image)) {
            $this->images->removeElement($image);
        }
    }
    */
}
