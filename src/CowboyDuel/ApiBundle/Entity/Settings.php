<?php

namespace CowboyDuel\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CowboyDuel\ApiBundle\Entity\Settings
 *
 * @ORM\Table(name="settings")
 * @ORM\Entity
 */
class Settings
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer $refreshContent
     *
     * @ORM\Column(name="refresh_content", type="integer", nullable=false)
     */
    private $refreshContent;

    /**
     * @var integer $timeLastRefresh
     *
     * @ORM\Column(name="timeLastRefresh", type="integer")
     */
    private $timeLastRefresh;


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
     * Set refreshContent
     *
     * @param integer $refreshContent
     * @return Settings
     */
    public function setRefreshContent($refreshContent)
    {
        $this->refreshContent = $refreshContent;
    
        return $this;
    }
    /**
     * Get refreshContent
     *
     * @return integer 
     */
    public function getRefreshContent()
    {
        return $this->refreshContent;
    }
    
    /**
     * Set timeLastRefresh
     *
     * @param integer $timeLastRefresh
     * @return Settings
     */
    public function setTimeLastRefresh($timeLastRefresh)
    {
    	$this->timeLastRefresh = $timeLastRefresh;
    
    	return $this;
    }
    
    /**
     * Get timeLastRefresh
     *
     * @return integer
     */
    public function getTimeLastRefresh()
    {
    	return $this->timeLastRefresh;
    }
}