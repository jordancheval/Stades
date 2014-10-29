<?php

namespace Stades\StadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeTerrain
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Stades\StadesBundle\Entity\TypeTerrainRepository")
 */
class TypeTerrain
{
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
     * @ORM\Column(name="type_terrain", type="string", length=128)
     */
    private $typeTerrain;


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
     * Set typeTerrain
     *
     * @param string $typeTerrain
     * @return TypeTerrain
     */
    public function setTypeTerrain($typeTerrain)
    {
        $this->typeTerrain = $typeTerrain;

        return $this;
    }

    /**
     * Get typeTerrain
     *
     * @return string 
     */
    public function getTypeTerrain()
    {
        return $this->typeTerrain;
    }
}
