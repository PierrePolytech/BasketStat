<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="club")
 */
class Club
{
    /**
     * @ORM\Column(name="idClub", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(name="nomClub",type="string", length=100)
     */
    public $nomClub;

    /**
     * @ORM\OneToMany(targetEntity=Equipe::class, mappedBy="club", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     * @ORM\JoinColumn(name="idEquipe", referencedColumnName="idEquipe")
     */
    public $equipe;

    /**
     * CONSTRUCTEUR
     */

    public function __construct(){
        $this->equipe=new ArrayCollection();
    }

    /**
     * GETTERS ET SETTERS
     */

    public function getId(){
        return $this->id;
    }

    public function getNomClub(){
        return $this->nomClub;
    }
    public function setNomClub($nomClub){
        $this->nomClub=$nomClub;
    }

    public function getEquipe(){
        return $this->equipe;
    }

    public function addEquipe(Equipe $equipe)
    {
        if (!$this->equipe->contains($equipe)) {
            $this->equipe->add($equipe);
        }
        return $this;
    }

    public function removeEquipe(Equipe $equipe)
    {
        if ($this->equipe->contains($equipe)) {
            $this->equipe->removeElement($equipe);
        }
        return $this;
    }
}