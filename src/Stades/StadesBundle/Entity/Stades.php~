<?php

namespace Stades\StadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Stades
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Stades\StadesBundle\Entity\StadesRepository")
 */
class Stades
{
    /**
     * @ORM\ManyToMany(targetEntity="Stades\StadesBundle\Entity\TypeTerrain", cascade={"persist"})
     */
    private $typeTerrain;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_stade", type="string", length=255)
     */
    private $nomStade;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_stade", type="string", length=255)
     */
    private $adresseStade;

    /**
     * @var string
     *
     * @ORM\Column(name="lien_maps", type="string", length=255)
     */
    private $lienMaps;
    
    /**
     * @var \Datetime
     * 
     * @ORM\Column(name="date_ajout", type="date")
     */
    private $dateAjout;
    
    public function __construct()
    {
        $this->dateAjout = new \Datetime();
        $this->typeTerrain = new ArrayCollection();
    }

        /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomStade
     *
     * @param string $nomStade
     * @return Stades
     */
    public function setNomStade($nomStade)
    {
        $this->nomStade = $nomStade;

        return $this;
    }

    /**
     * Get nomStade
     *
     * @return string 
     */
    public function getNomStade()
    {
        return $this->nomStade;
    }

    /**
     * Set adresseStade
     *
     * @param string $adresseStade
     * @return Stades
     */
    public function setAdresseStade($adresseStade)
    {
        $this->adresseStade = $adresseStade;

        return $this;
    }

    /**
     * Get adresseStade
     *
     * @return string 
     */
    public function getAdresseStade()
    {
        return $this->adresseStade;
    }

    /**
     * Set lienMaps
     *
     * @param string $lienMaps
     * @return Stades
     */
    public function setLienMaps($lienMaps)
    {
        $this->lienMaps = $lienMaps;

        return $this;
    }

    /**
     * Get lienMaps
     *
     * @return string 
     */
    public function getLienMaps()
    {
        return $this->lienMaps;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     * @return Stades
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime 
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Add typeTerrain
     *
     * @param \Stades\StadesBundle\Entity\TypeTerrain $typeTerrain
     * @return Stades
     */
    public function addTypeTerrain(\Stades\StadesBundle\Entity\TypeTerrain $typeTerrain)
    {
        $this->typeTerrain[] = $typeTerrain;

        return $this;
    }

    /**
     * Remove typeTerrain
     *
     * @param \Stades\StadesBundle\Entity\TypeTerrain $typeTerrain
     */
    public function removeTypeTerrain(\Stades\StadesBundle\Entity\TypeTerrain $typeTerrain)
    {
        $this->typeTerrain->removeElement($typeTerrain);
    }

    /**
     * Get typeTerrain
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTypeTerrain()
    {
        return $this->typeTerrain;
    }
}
