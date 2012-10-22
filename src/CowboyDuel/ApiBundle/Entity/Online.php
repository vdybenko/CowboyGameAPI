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
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     * @var string $entertime
     *
     * @ORM\Column(name="enterTime", type="string", length=12, nullable=false)
     */
    private $entertime;

    /**
     * @var string $exittime
     *
     * @ORM\Column(name="exitTime", type="string", length=12, nullable=false)
     */
    private $exittime;



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
     * Set entertime
     *
     * @param string $entertime
     * @return Online
     */
    public function setEntertime($entertime)
    {
        $this->entertime = $entertime;
    
        return $this;
    }

    /**
     * Get entertime
     *
     * @return string 
     */
    public function getEntertime()
    {
        return $this->entertime;
    }

    /**
     * Set exittime
     *
     * @param string $exittime
     * @return Online
     */
    public function setExittime($exittime)
    {
        $this->exittime = $exittime;
    
        return $this;
    }

    /**
     * Get exittime
     *
     * @return string 
     */
    public function getExittime()
    {
        return $this->exittime;
    }
}