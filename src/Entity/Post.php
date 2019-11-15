<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 * @ORM\Table(name="post")
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Temat", inversedBy="temat")
     * @ORM\JoinColumn(nullable=false)
     */
    private $temat;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Akapit", mappedBy="post")
     */
    private $akapity;

    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tytul;

        
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
     * @ORM\Column(type="smallint")
     */
    private $italict;
    
    /**
     * @ORM\Column(type="smallint")
     */
    private $boldt;
    
    
    /*
     * @ORM\Column(type="float")
     *
    private $odlg;
    
    **
     * @ORM\Column(type="float")
     *
    private $odlp;
    
    **
     * @ORM\Column(type="float")
     *
    private $odld;
    
    **
     * @ORM\Column(type="float")
     *
    private $odll;
    
    **
     * @ORM\Column(type="float")
     *
    private $roz;
    
    **
     * @ORM\Column(type="string", length=255)
     *
    private $kolor;
    
    **
     * @ORM\Column(type="smallint")
     *
    private $italic;
    
    **
     * @ORM\Column(type="smallint")
     *
    private $bold;
    */
    
    
    public function __construct()
    {
        $this->akapity = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemat(): ?Temat
    {
        return $this->temat;
    }

    public function setTemat(Temat $temat)
    {
        $this->temat = $temat;

        return $this;
    }

    /**
     * @return Collection|Akapit[]
     */
    public function getAkapity(): Collection
    {
        return $this->akapity;
    }

    public function addAkapity(Akapit $akapity): self
    {
        if (!$this->akapity->contains($akapity)) {
            $this->akapity[] = $akapity;
            $akapity->setPost($this);
        }

        return $this;
    }

    public function removeAkapity(Akapit $akapity): self
    {
        if ($this->akapity->contains($akapity)) {
            $this->akapity->removeElement($akapity);
            // set the owning side to null (unless already changed)
            if ($akapity->getPost() === $this) {
                $akapity->setPost(null);
            }
        }

        return $this;
    }

    public function getTytul(): ?string
    {
        return $this->tytul;
    }

    public function setTytul(?string $tytul): self
    {
        $this->tytul = $tytul;

        return $this;
    }
    
    /*
    public function getOdlt(): ?array
    {
        return $this->odlt;
    }
    
    public function setOdlt(array $odlt): self
    {
        $this->odlt = $odlt;
        
        return $this;
    }
    */    
    
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

    
    
        
    /*
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
    */
    
    public function __toString()
    {
        return $this->getTytul();
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

    public function getOdlt(): ?float
    {
        return $this->odlt;
    }

    public function setOdlt(float $odlt): self
    {
        $this->odlt = $odlt;

        return $this;
    }
    
}
