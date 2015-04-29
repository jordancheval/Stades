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
     * @ORM\Column(name="adresse_stade", type="string", length=255, nullable=true)
     */
    private $adresseStade;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;
    
    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;
    
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

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return Stades
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Stades
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
