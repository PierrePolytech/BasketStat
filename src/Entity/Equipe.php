<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="equipe")
 */
class Equipe
{
    /**
     * @ORM\Column(name="idEquipe", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(name="nomEquipe",type="string", length=50)
     */
    private $nomEquipe;

    /**
     * @ORM\ManyToOne(targetEntity="Club", inversedBy="Equipe")
     * @ORM\JoinColumn(name="idClub", referencedColumnName="idClub", nullable=FALSE)
     */
    protected $club;

    /**
     * GETTERS ET SETTERS
     */

    public function getId()
    {
        return $this->id;
    }

    public function getNomEquipe()
    {
        return $this->nomEquipe;
    }

    public function setNomEquipe($nomEquipe): void
    {
        $this->nomEquipe = $nomEquipe;
    }


    public function getClub()
    {
        return $this->club;
    }

    public function setClub($club): void
    {
        $this->club = $club;
    }
}