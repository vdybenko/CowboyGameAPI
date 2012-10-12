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
     * @var string $in
     *
     * @ORM\Column(name="in", type="string", length=12, nullable=false)
     */
    private $in;

    /**
     * @var string $out
     *
     * @ORM\Column(name="out", type="string", length=12, nullable=false)
     */
    private $out;



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
     * Set in
     *
     * @param string $in
     * @return Online
     */
    public function setIn($in)
    {
        $this->in = $in;
    
        return $this;
    }

    /**
     * Get in
     *
     * @return string 
     */
    public function getIn()
    {
        return $this->in;
    }

    /**
     * Set out
     *
     * @param string $out
     * @return Online
     */
    public function setOut($out)
    {
        $this->out = $out;
    
        return $this;
    }

    /**
     * Get out
     *
     * @return string 
     */
    public function getOut()
    {
        return $this->out;
    }
}