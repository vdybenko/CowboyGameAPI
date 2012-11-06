<?php

namespace CowboyDuel\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CowboyDuel\ApiBundle\Entity\Transactions
 *
 * @ORM\Table(name="transactions")
 * @ORM\Entity
 */
class Transactions
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
     * @ORM\Column(name="authen", type="string", length=255, nullable=false)
     */
    private $authen;

    /**
     * @var integer $value
     *
     * @ORM\Column(name="value", type="integer", nullable=false)
     */
    private $value;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string $date
     *
     * @ORM\Column(name="date", type="string", length=15, nullable=false)
     */
    private $date;
    
    /**
     * @var string $opponentAuthen
     *
     * @ORM\Column(name="opponent_authen", type="string")
     */
    private $opponentAuthen;

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
     * @return Transactions
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
     * Set value
     *
     * @param integer $value
     * @return Transactions
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Transactions
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return Transactions
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * Set date
     *
     * @param string $opponentAuthen
     * @return Transactions
     */
    public function setOpponentAuthen($opponentAuthen)
    {
    	$this->opponentAuthen = $opponentAuthen;
    
    	return $this;
    }
    
    /**
     * Get opponentAuthen
     *
     * @return string
     */
    public function getOpponentAuthen()
    {
    	return $this->opponentAuthen;
    }
}