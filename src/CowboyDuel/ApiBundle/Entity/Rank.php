<?php

namespace CowboyDuel\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CowboyDuel\ApiBundle\Entity\Rank
 *
 * @ORM\Table(name="rank")
 * @ORM\Entity
 */
class Rank
{
    /**
     * @var integer $level
     *
     * @ORM\Column(name="level", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $level;

    /**
     * @var string $rankName
     *
     * @ORM\Column(name="rank_name", type="string", length=20, nullable=false)
     */
    private $rankName;



    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set rankName
     *
     * @param string $rankName
     * @return Rank
     */
    public function setRankName($rankName)
    {
        $this->rankName = $rankName;
    
        return $this;
    }

    /**
     * Get rankName
     *
     * @return string 
     */
    public function getRankName()
    {
        return $this->rankName;
    }
}