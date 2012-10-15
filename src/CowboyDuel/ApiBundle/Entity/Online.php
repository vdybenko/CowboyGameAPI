<?php

namespace CowboyDuel\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CowboyDuel\ApiBundle\Entity\Online
 *
 * @ORM\Table(name="online")
 * @ORM\Entity
 */
class Online
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $authen
     *
     * @ORM\Column(name="authen", type="string", length=50, nullable=false)
     */
    private $authen;

    /**
     * @var integer $online
     *
     * @ORM\Column(name="online", type="integer", nullable=false)
     */
    private $online;

    /**
     * @var string $in
     *
     * @ORM\Column(name="enterTime", type="string", length=12, nullable=false)
     */
    private $enterTime;

    /**
     * @var string $out
     *
     * @ORM\Column(name="exitTime", type="string", length=12, nullable=false)
     */
    private $exitTime;



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
     * Set authen
     *
     * @param string $authen
     * @return Online
     */
    public function setAuthen($authen)
    {
        $this->authen = $authen;
    
        return $this;
    }

    /**
     * Get authen
     *
     * @return string 
     */
    public function getAuthen()
    {
        return $this->authen;
    }

    /**
     * Set online
     *
     * @param integer $online
     * @return Online
     */
    public function setOnline($online)
    {
        $this->online = $online;
    
        return $this;
    }

    /**
     * Get online
     *
     * @return integer 
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * Set enterTime
     *
     * @param string $in
     * @return Online
     */
    public function setEnterTime($enterTime)
    {
        $this->enterTime = $enterTime;
    
        return $this;
    }

    /**
     * Get enterTime
     *
     * @return string 
     */
    public function getEnterTime()
    {
        return $this->in;
    }

    /**
     * Set exitTime
     *
     * @param string $exitTime
     * @return Online
     */
    public function setExitTime($exitTime)
    {
        $this->exitTime = $exitTime;
    
        return $this;
    }

    /**
     * Get exitTime
     *
     * @return string 
     */
    public function getExitTime()
    {
        return $this->exitTime;
    }
}